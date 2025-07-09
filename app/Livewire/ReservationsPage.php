<?php

namespace App\Livewire;

use App\Models\Table;
use App\Models\Reservation;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

#[Title('Reservas - DigiRest')]
class ReservationsPage extends Component
{
    public $tables;
    public $selectedTable = null;
    public $floor = '1';

    public $customer_name;
    public $customer_phone;
    public $date;
    public $start_time;
    public $end_time;
    public $guests;

    protected $rules = [
        'customer_name' => 'required|string|max:255',
        'customer_phone' => 'required|string|min:9|max:15',
        'date' => 'required|date|after_or_equal:today',
        'start_time' => 'required',
        'end_time' => 'required|after:start_time',
        'guests' => 'required|integer|min:1|max:8',
        'selectedTable' => 'required|exists:tables,id',
    ];

    public function mount()
    {
        $this->refreshTables();
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    // ✅ No cambia el estado en la BD, solo en Livewire (temporalmente)
    public function selectTable($tableId)
    {
        $table = Table::find($tableId);

        if ($table && $table->status === 'available') {
            $this->selectedTable = $table->id;
        }
        $this->refreshTables(); // <-- refrescar la tabla después de cada selección
    }

    public function deselectTable()
    {
        $this->selectedTable = null;
    }

    public function setFloor($floor)
    {
        $this->floor = $floor;
        $this->deselectTable();
    }

    public function isFormComplete()
    {
        return $this->customer_name && $this->customer_phone && $this->date &&
            $this->start_time && $this->end_time && $this->guests;
    }
    
    #[Computed]
    public function formComplete()
    {
        return $this->isFormComplete();
    }

    #[Computed]
    public function canSubmitReservation()
    {
        return $this->isFormComplete() && $this->selectedTable;
    }

    // Método para crear la reserva
    // 🔒 Bloqueo optimista para evitar conflictos de concurrencia
    public function createReservation()
    {
        if (!$this->selectedTable) {
            $this->dispatch('sweet.error', [
                'message' => 'Debes seleccionar una mesa para poder reservar.'
            ]);
            return;
        }

        try {
            $this->validate();
        } catch (ValidationException $e) {
            // 🔁 Enviamos los campos con error al frontend
            $this->dispatch('form.validation.failed', [
                'errors' => $e->validator->errors()->keys(),
            ]);
            throw $e; // Permite que Livewire muestre los errores normalmente también
        }

        DB::beginTransaction();

        try {
            $table = Table::lockForUpdate()->find($this->selectedTable);

            if (!$table || $table->status !== 'available') {
                DB::rollBack();

                $this->dispatch('sweet.error', [
                    'message' => 'La mesa seleccionada ya fue ocupada. Elige otra por favor.'
                ]);

                $this->reset('selectedTable');
                $this->refreshTables();
                return;
            }

            $table->update(['status' => 'occupied']);

            Reservation::create([
                'customer_name' => $this->customer_name,
                'customer_phone' => $this->customer_phone,
                'date' => $this->date,
                'start_time' => $this->start_time,
                'end_time' => $this->end_time,
                'guests' => $this->guests,
                'table_id' => $this->selectedTable,
                'status' => 'pending',
            ]);

            DB::commit();

            $this->resetExcept(['tables']);
            $this->refreshTables();

            $this->dispatch('sweet.success');

        } catch (\Throwable $e) {
            DB::rollBack();

            $this->dispatch('sweet.error', [
                'message' => 'Ocurrió un error al procesar la reserva. Intenta nuevamente.'
            ]);
        }
    }

    public function refreshTables()
    {
        $this->tables = Table::all();
    }

    public function render()
    {
        return view('livewire.reservations-page', [
            'tables' => $this->tables,
            'formComplete' => $this->formComplete,
            'canSubmitReservation' => $this->canSubmitReservation,
        ]);
    }
}
