<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Habilitação Jurídica', 'id_countries' => 1],
            ['name' => 'Habilitação Fiscal e Trabalhista', 'id_countries' => 1],
            ['name' => 'Qualificação Econômico-Financeira', 'id_countries' => 1],
            ['name' => 'Qualificação Técnica', 'id_countries' => 1],
            ['name' => 'Outras Declarações', 'id_countries' => 1],
            ['name' => 'REGLAMENTO ESPECIFICO DE ADQUISICIONES - OEI ARGENTINA (versión web)', 'id_countries' => 2],
            ['name' => 'CGL - LPN XX-2022 EQUIPAMIENTO ', 'id_countries' => 2],
            ['name' => 'CPL - LPN 14-2022 EQUIPAMIENTO VIAMONTE 525 RELLAMADO', 'id_countries' => 2],
            ['name' => '1 - LLAMADO Y CRONOGRAMA (Apartado A)', 'id_countries' => 2],
            ['name' => '2 - CONDICIONES PARTICULARES DE LA LICITACIÓN (Apartado B)', 'id_countries' => 2],
            ['name' => '3 - CERTIFICACION DE SERVICIOS Y FACTURACIÓN (Apartado C)', 'id_countries' => 2],
            ['name' => '4 - ESPECIFICACIONES TÉCNICAS (Apartado E)', 'id_countries' => 2],
            ['name' => '5 - FORMULARIOS CARPETA COMERCIAL (Anexo 2)', 'id_countries' => 2],
            ['name' => '6 - FORMULARIOS CARPETA TÉCNICA (Anexo 2)', 'id_countries' => 2],
            ['name' => '7 - FORMULARIOS CARPETA FORMAL - ALTA PROVEEDOR (Anexo 2)', 'id_countries' => 2],
            ['name' => '8 - FORMULARIO REGISTRO DE PARTICIPACIÓN (Anexo 2)', 'id_countries' => 2],
            ['name' => '9 - MODELOS DE CONTRATO - POLIZAS Y ACTAS DE RECEPCIÓN (Anexo 3)', 'id_countries' => 2],
            ['name' => '10 - ANEXO DOCUMENTACIÓN FORMAL (Anexo 4)', 'id_countries' => 2],
            ['name' => '11 - ANEXO UTE-APCA (Anexo 5)', 'id_countries' => 2],
        ];

        foreach ($categories as $categoryData) {
            $category = Category::create($categoryData);

            // Associar subcategorias a cada categoria
            if ($category->name === 'Habilitação Jurídica') {
                $subcategories = [
                    ['name' => 'Ato Constitutivo'],
                    ['name' => 'Todas as alterações ou consolidação do Ato Constitutivo'],
                    ['name' => 'Ato Constitutivo (contrato social, estatuto social ou requerimento de empresário);'],
                    ['name' => 'Todas as alterações ou consolidação do Ato Constitutivo;'],
                    ['name' => 'Procuração dos respectivos representantes nas licitações;'],
                    ['name' => 'Documentos dos Sócios;'],
                    ['name' => 'Documentos do Representante Legal; '],
                    ['name' => 'Prova de Administração ou Diretoria (dependo do tipo empresarial)'],
                    ['name' => 'Decreto de Autorização de Funcionamento (no caso de empresas estrangeiras que funcionam no Brasil).']
                ];

                foreach ($subcategories as $subcategoryData) {
                    $subcategoryData['parent_id'] = $category->id;
                    Category::create($subcategoryData);
                }
            }

            if ($category->name === 'Habilitação Fiscal e Trabalhista') {
                $subcategories = [
                    ['name' => ' Cartão de CNPJ'],
                    ['name' => 'Inscrição Estadual'],
                    ['name' => 'Inscrição Municipal'],
                    ['name' => 'Certidão negativa de débitos Federais'],
                    ['name' => 'Certidão negativa de débitos Estaduais'],
                    ['name' => 'Certidão negativa de débitos Municipais'],
                    ['name' => 'Certidão negativa de débitos Trabalhista'],
                    ['name' => 'Certidão negativa de débitos do FGTS'],
                    ['name' => 'Certidão negativa de débitos do INSS']


                ];

                foreach ($subcategories as $subcategoryData) {
                    $subcategoryData['parent_id'] = $category->id;
                    Category::create($subcategoryData);
                }
            }

            if ($category->name === 'Qualificação Econômico-Financeira') {
                $subcategories = [
                    ['name' => 'Balanço patrimonial;'],
                    ['name' => 'Índices Contábeis;'],
                    ['name' => 'Capital social ou patrimônio líquido;'],
                    ['name' => 'Certidão negativa de Falência e Concordata;']
                ];

                foreach ($subcategories as $subcategoryData) {
                    $subcategoryData['parent_id'] = $category->id;
                    Category::create($subcategoryData);
                }
            }

            if ($category->name === 'Qualificação Técnica') {
                $subcategories = [
                    ['name' => 'Atestado de capacidade Técnica Profissional;'],
                    ['name' => 'Atestado de Capacidade Técnica Operacional;'],
                    ['name' => 'Inscrição na entidade profissional competente;'],
                    ['name' => 'Registro em órgão regulamentador;']
                ];

                foreach ($subcategories as $subcategoryData) {
                    $subcategoryData['parent_id'] = $category->id;
                    Category::create($subcategoryData);
                }
            }

            if ($category->name === 'Outras Declarações') {
                $subcategories = [
                    ['name' => 'Declaração Menor/Aprendiz;'],
                    ['name' => 'Declaração ME/EPP;'],
                    ['name' => 'Declaração de Habilitação;'],
                    ['name' => 'Declaração de Inexistência de Fatos Impeditivos;'],
                    ['name' => 'Declaração sobre Trabalho Forçado e/ou Degradante;'],
                    ['name' => 'Declaração de Elaboração independente de Proposta;'],
                    ['name' => 'Declaração de Renúncia de Vistoria;'],
                    ['name' => 'Carta de Credenciamento;']
                ];

                foreach ($subcategories as $subcategoryData) {
                    $subcategoryData['parent_id'] = $category->id;
                    Category::create($subcategoryData);
                }
            }
        }
    }


}
