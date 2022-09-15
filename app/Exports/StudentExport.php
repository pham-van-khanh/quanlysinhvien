<?php

namespace App\Exports;

use App\Models\Subject;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class StudentExport implements FromCollection, Responsable, WithMapping, WithHeadings, WithEvents
{
    use Exportable;

    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    private $fileName = "point-student.xlsx";

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Subject::with('students')->whereHas('students', function ($q) {
            $q->where('subject_id', $this->id);
        })->get();
    }

    public function map($subject): array
    {
        $data = [];
        foreach ($subject->students as $student) {
            $data[] = [
                $student->id,
                $student->name,
                $student->email,
                $student->pivot->mark
            ];
        }
        return $data;
    }

    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Email',
            'Mark'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:D1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            }
        ];
    }
}
