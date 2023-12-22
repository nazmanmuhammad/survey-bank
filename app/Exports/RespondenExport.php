<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Events\AfterSheet;

class RespondenExport implements FromView, ShouldAutoSize, WithEvents, WithColumnFormatting
{
    private $responden;

    public function __construct($responden)
    {
        $this->responden = $responden;
    }

    public function registerEvents(): array
    {

        return [
            // BeforeSheet::class => function (BeforeSheet $event) {
            //     $event->sheet
            //         ->getPageSetup()
            //         ->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
            // },

            AfterSheet::class    => function (AfterSheet $event) {
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(20);
                $event->sheet->getColumnDimension('A')->setAutoSize(false);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(30);
                $event->sheet->getColumnDimension('B')->setAutoSize(false);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(20);
                $event->sheet->getColumnDimension('C')->setAutoSize(false);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(20);
                $event->sheet->getColumnDimension('D')->setAutoSize(false);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(20);
                $event->sheet->getColumnDimension('E')->setAutoSize(false);
                

                $styleArray = [
                    'font' => [
                        'bold' => true,
                        'color' => array('rgb' => 'FFFFFF'),
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => [
                            'argb' => '2B579A'
                        ]
                    ],
                ];

                $event->sheet->getDelegate()->getStyle('A2:E2')->applyFromArray($styleArray);
            },
        ];
    }

    public function columnFormats(): array
    {
        return [
            //
        ];
    }

    public function view(): View
    {
        return view('export.responden', [
            'responden' => $this->responden
        ]);
    }
}
