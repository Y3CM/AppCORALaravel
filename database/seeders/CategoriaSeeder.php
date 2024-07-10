<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        $categoria = new Categoria();
        $categoria->nombre='General';
        $categoria->descripcion='Categoría general para todos los productos.';
        $categoria->created_at=now();
        $categoria->updated_at=now();
        $categoria->save();

        $categoria = new Categoria();
        $categoria->nombre='Frutas';
        $categoria->descripcion='Variedad de frutas frescas cultivadas localmente, incluyendo manzanas, naranjas, plátanos, fresas y muchas más.';
        $categoria->created_at=now();
        $categoria->updated_at=now();
        $categoria->save();

        $categoria = new Categoria();
        $categoria->nombre='Verduras';
        $categoria->descripcion='Diversidad de verduras frescas y de temporada, como tomates, zanahorias, lechugas, espinacas, y otros vegetales.';
        $categoria->created_at=now();
        $categoria->updated_at=now();
        $categoria->save();

        $categoria = new Categoria();
        $categoria->nombre='Legumbres';
        $categoria->descripcion='Selección de legumbres secas y frescas, tales como frijoles, garbanzos, lentejas, y guisantes.';
        $categoria->created_at=now();
        $categoria->updated_at=now();
        $categoria->save();

        $categoria = new Categoria();
        $categoria->nombre='Cereales';
        $categoria->descripcion='Diferentes tipos de cereales y granos cultivados, como maíz, trigo, arroz, avena y cebada.';
        $categoria->created_at=now();
        $categoria->updated_at=now();
        $categoria->save();

        $categoria = new Categoria();
        $categoria->nombre='Plantas y Plántulas';
        $categoria->descripcion='Plantas jóvenes y plántulas listas para ser trasplantadas, incluyendo árboles frutales, arbustos, plantas ornamentales, y vegetales.';
        $categoria->created_at=now();
        $categoria->updated_at=now();
        $categoria->save();

        $categoria = new Categoria();
        $categoria->nombre='Semillas';
        $categoria->descripcion='Variedad de semillas para cultivos de cereales, hortalizas, frutas, y flores. Incluye semillas híbridas, orgánicas y tratadas.';
        $categoria->created_at=now();
        $categoria->updated_at=now();
        $categoria->save();

        $categoria = new Categoria();
        $categoria->nombre='Fertilizantes';
        $categoria->descripcion='Productos químicos y orgánicos utilizados para mejorar la fertilidad del suelo y promover el crecimiento saludable de las plantas.';
        $categoria->created_at=now();
        $categoria->updated_at=now();
        $categoria->save();
    }
}