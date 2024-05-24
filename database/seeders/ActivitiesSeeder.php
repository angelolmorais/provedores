<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Activity;

class ActivitiesSeeder extends Seeder
{
  
    public function run()
    {
        $activities = [
    ['name' => 'Arte e Antiguidades', 'id_countries' => 1],
    ['name' => 'Artigos Religiosos', 'id_countries' => 1],
    ['name' => 'Assinaturas e Revistas', 'id_countries' => 1],
    ['name' => 'Automóveis e Veículos', 'id_countries' => 1],
    ['name' => 'Bebês e Cia', 'id_countries' => 1],
    ['name' => 'Blu-Ray', 'id_countries' => 1],
    ['name' => 'Brindes / Materiais Promocionais', 'id_countries' => 1],
    ['name' => 'Brinquedos e Games', 'id_countries' => 1],
    ['name' => 'Casa e Decoração', 'id_countries' => 1],
    ['name' => 'CDs', 'id_countries' => 1],
    ['name' => 'Colecionáveis', 'id_countries' => 1],
    ['name' => 'Compras Coletivas', 'id_countries' => 1],
    ['name' => 'Construção e Ferramentas', 'id_countries' => 1],
    ['name' => 'Cosméticos e Perfumaria', 'id_countries' => 1],
    ['name' => 'Cursos e Educação', 'id_countries' => 1],
    ['name' => 'Discos de Vinil', 'id_countries' => 1],
    ['name' => 'DVDs', 'id_countries' => 1],
    ['name' => 'Eletrodomésticos', 'id_countries' => 1],
    ['name' => 'Eletrônicos', 'id_countries' => 1],
    ['name' => 'Emissoras de Rádio', 'id_countries' => 1],
    ['name' => 'Emissoras de Televisão', 'id_countries' => 1],
    ['name' => 'Empregos', 'id_countries' => 1],
    ['name' => 'Empresas de Telemarketing', 'id_countries' => 1],
    ['name' => 'Esporte e Lazer', 'id_countries' => 1],
    ['name' => 'Fitas K7 Gravadas', 'id_countries' => 1],
    ['name' => 'Flores, Cestas e Presentes', 'id_countries' => 1],
    ['name' => 'Fotografia', 'id_countries' => 1],
    ['name' => 'HD-DVD', 'id_countries' => 1],
    ['name' => 'Igrejas / Templos / Instituições Religiosas', 'id_countries' => 1],
    ['name' => 'Indústria, Comércio e Negócios', 'id_countries' => 1],
    ['name' => 'Infláveis Promocionais', 'id_countries' => 1],
    ['name' => 'Informática', 'id_countries' => 1],
    ['name' => 'Ingressos', 'id_countries' => 1],
    ['name' => 'Instrumentos Musicais', 'id_countries' => 1],
    ['name' => 'Joalheria', 'id_countries' => 1],
    ['name' => 'Lazer', 'id_countries' => 1],
    ['name' => 'LD', 'id_countries' => 1],
    ['name' => 'Livros', 'id_countries' => 1],
    ['name' => 'MD', 'id_countries' => 1],
    ['name' => 'Moda e Acessórios', 'id_countries' => 1],
    ['name' => 'Motéis', 'id_countries' => 1],
    ['name' => 'Música Digital', 'id_countries' => 1],
    ['name' => 'Natal', 'id_countries' => 1],
    ['name' => 'Negócios e Oportunidades', 'id_countries' => 1],
    ['name' => 'Outros Serviços', 'id_countries' => 1],
    ['name' => 'Outros Serviços de Avaliação', 'id_countries' => 1],
    ['name' => 'Papelaria e Escritório', 'id_countries' => 1],
    ['name' => 'Páscoa', 'id_countries' => 1],
    ['name' => 'Pet Shop', 'id_countries' => 1],
    ['name' => 'Saúde', 'id_countries' => 1],
    ['name' => 'Serviço Advocaticios', 'id_countries' => 1],
    ['name' => 'Serviço de Distribuição de Jornais / Revistas', 'id_countries' => 1],
    ['name' => 'Serviços Administrativos', 'id_countries' => 1],
    ['name' => 'Serviços Artísticos', 'id_countries' => 1],
    ['name' => 'Serviços de Abatedouros / Matadouros', 'id_countries' => 1],
    ['name' => 'Serviços de Aeroportos', 'id_countries' => 1],
    ['name' => 'Serviços de Agências', 'id_countries' => 1],
    ['name' => 'Serviços de Aluguel / Locação', 'id_countries' => 1],
    ['name' => 'Serviços de Armazenagem', 'id_countries' => 1],
    ['name' => 'Serviços de Assessorias', 'id_countries' => 1],
    ['name' => 'Serviços de Assistência Técnica / Instalações', 'id_countries' => 1],
    ['name' => 'Serviços de Associações', 'id_countries' => 1],
    ['name' => 'Serviços de Bancos de Sangue', 'id_countries' => 1],
    ['name' => 'Serviços de Bibliotecas', 'id_countries' => 1],
    ['name' => 'Serviços de Cartórios', 'id_countries' => 1],
    ['name' => 'Serviços de Casas Lotéricas', 'id_countries' => 1],
    ['name' => 'Serviços de Confecções', 'id_countries' => 1],
    ['name' => 'Serviços de Consórcios', 'id_countries' => 1],
    ['name' => 'Serviços de Consultorias', 'id_countries' => 1],
    ['name' => 'Serviços de Cooperativas', 'id_countries' => 1],
    ['name' => 'Serviços de Despachante', 'id_countries' => 1],
    ['name' => 'Serviços de Engenharia', 'id_countries' => 1],
    ['name' => 'Serviços de Estacionamentos', 'id_countries' => 1],
    ['name' => 'Serviços de Estaleiros', 'id_countries' => 1],
    ['name' => 'Serviços de Exportação / Importação', 'id_countries' => 1],
    ['name' => 'Serviços de Geólogos', 'id_countries' => 1],
    ['name' => 'Serviços de joalheiros', 'id_countries' => 1],
    ['name' => 'Serviços de Leiloeiros', 'id_countries' => 1],
    ['name' => 'Serviços de limpeza', 'id_countries' => 1],
    ['name' => 'Serviços de Loja de Conveniência', 'id_countries' => 1],
    ['name' => 'Serviços de Mão de Obra', 'id_countries' => 1],
    ['name' => 'Serviços de Órgão Públicos', 'id_countries' => 1],
    ['name' => 'Serviços de Pesquisas', 'id_countries' => 1],
    ['name' => 'Serviços de Portos', 'id_countries' => 1],
    ['name' => 'Serviços de Saúde / Bem Estar', 'id_countries' => 1],
    ['name' => 'Serviços de Seguradoras', 'id_countries' => 1],
    ['name' => 'Serviços de Segurança', 'id_countries' => 1],
    ['name' => 'Serviços de Sinalização', 'id_countries' => 1],
    ['name' => 'Serviços de Sindicatos / Federações', 'id_countries' => 1],
    ['name' => 'Serviços de Traduções', 'id_countries' => 1],
    ['name' => 'Serviços de Transporte', 'id_countries' => 1],
    ['name' => 'Serviços de Utilidade Pública', 'id_countries' => 1],
    ['name' => 'Serviços em Agricultura / Pecuária / Piscicultura', 'id_countries' => 1],
    ['name' => 'Serviços em Alimentação', 'id_countries' => 1],
    ['name' => 'Serviços em Arte', 'id_countries' => 1],
    ['name' => 'Serviços em Cine / Foto / Som', 'id_countries' => 1],
    ['name' => 'Serviços em Comunicação', 'id_countries' => 1],
    ['name' => 'Serviços em Construção', 'id_countries' => 1],
    ['name' => 'Serviços em Ecologia / Meio Ambiente', 'id_countries' => 1],
    ['name' => 'Serviços em Eletroeletrônica / Metal Mecânica', 'id_countries' => 1],
    ['name' => 'Serviços em Festas / Eventos', 'id_countries' => 1],
    ['name' => 'Serviços em Informática', 'id_countries' => 1],
    ['name' => 'Serviços em Internet', 'id_countries' => 1],
    ['name' => 'Serviços em Jóias / Relógios / Óticas', 'id_countries' => 1],
    ['name' => 'Serviços em Telefonia', 'id_countries' => 1],
    ['name' => 'Serviços em Veículos', 'id_countries' => 1],
    ['name' => 'Serviços Esotéricos / Místicos', 'id_countries' => 1],
    ['name' => 'Serviços Financeiros', 'id_countries' => 1],
    ['name' => 'Serviços Funerários', 'id_countries' => 1],
    ['name' => 'Serviços Gerais', 'id_countries' => 1],
    ['name' => 'Serviços Gráficos / Editoriais', 'id_countries' => 1],
    ['name' => 'Serviços para Animais', 'id_countries' => 1],
    ['name' => 'Serviços para Deficientes', 'id_countries' => 1],
    ['name' => 'Serviços para Escritórios', 'id_countries' => 1],
    ['name' => 'Serviços para Roupas', 'id_countries' => 1],
    ['name' => 'Serviços Socias / Assistenciais', 'id_countries' => 1],
    ['name' => 'Sex Shop', 'id_countries' => 1],
    ['name' => 'Shopping Centers', 'id_countries' => 1],
    ['name' => 'Tabacaria', 'id_countries' => 1],
    ['name' => 'Tarifas Bancárias', 'id_countries' => 1],
    ['name' => 'Tarifas Telefônicas', 'id_countries' => 1],
    ['name' => 'Telefonia', 'id_countries' => 1],
    ['name' => 'Turismo', 'id_countries' => 1],
    ['name' => 'ALQUILER DE ESPACIOS', 'id_countries' => 2],
    ['name' => 'ARTICULOS DE LIBRERIA', 'id_countries' => 2],
    ['name' => 'DISEÑO', 'id_countries' => 2],
    ['name' => 'ELECTRODOMESTICOS', 'id_countries' => 2],
    ['name' => 'EQUIPAMIENTO AUDIOVISUAL', 'id_countries' => 2],
    ['name' => 'EVENTOS', 'id_countries' => 2],
    ['name' => 'GASTRONOMIA', 'id_countries' => 2],
    ['name' => 'HOTELERIA', 'id_countries' => 2],
    ['name' => 'IMPRENTA', 'id_countries' => 2],
    ['name' => 'INFORMATICA', 'id_countries' => 2],
    ['name' => 'INSTITUCIONES EDUCATIVAS', 'id_countries' => 2],
    ['name' => 'INSTRUMENTOS MUSICALES', 'id_countries' => 2],
    ['name' => 'LIBROS', 'id_countries' => 2],
    ['name' => 'LOGISTICA', 'id_countries' => 2],
    ['name' => 'MANTENIMIENTO Y SERVICIOS AFINES', 'id_countries' => 2],
    ['name' => 'MARKETING-ENCUESTAS', 'id_countries' => 2],
    ['name' => 'MERCHANDISING', 'id_countries' => 2],
    ['name' => 'MOBILIARIO', 'id_countries' => 2],
    ['name' => 'OBRA Y CONSTRUCCION', 'id_countries' => 2],
    ['name' => 'SALUD', 'id_countries' => 2],
    ['name' => 'SEGURIDAD Y CONTROL', 'id_countries' => 2],
    ['name' => 'SERVICIOS DE PUBLICIDAD', 'id_countries' => 2],
    ['name' => 'SERVICIOS INMOBILIARIOS', 'id_countries' => 2],
    ['name' => 'SERVICIOS PROFESIONALES Y CONSULTORIA', 'id_countries' => 2],
    ['name' => 'TELEFONIA Y COMUNICACIONES', 'id_countries' => 2],
    ['name' => 'TEXTILES', 'id_countries' => 2],
    ['name' => 'TRANSPORTE', 'id_countries' => 2],
    ['name' => 'VEHICULOS', 'id_countries' => 2]
        ];
        
        foreach ($activities as $activityData) {
            $activity = Activity::create($activityData);

            if ($activity->name === 'ALQUILER DE ESPACIOS') {
                $subactivities = [
                    ['name' => 'Ato Constitutivo'],
                    ['name' => 'BASE DE CAMPAMENTOS'],
                    ['name' => 'CENTRO CULTURAL Y RECREATIVO'],
                    ['name' => 'COCHERAS'],
                    ['name' => 'SALONES'],
                    ['name' => 'TEATROS']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }

            if ($activity->name === 'ARTICULOS DE LIBRERIA') {
                $subactivities = [
                    ['name' => 'ARTICULOS DE LIBRERIA'],
                    ['name' => 'PAPELERA']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }

            if ($activity->name === 'DISEÑO') {
                $subactivities = [
                    ['name' => 'DISEÑADORES GRAFICOS'],
                    ['name' => 'E-LEARNING Y PAGINAS WEB'],
                    ['name' => 'PROYECTOS EDUCATIVOS, SOCIALES Y/O CULTURALES']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }

            if ($activity->name === 'ELECTRODOMESTICOS') {
                $subactivities = [
                    ['name' => 'ALQUILER'],
                    ['name' => 'REPARACIÓN'],
                    ['name' => 'VENTA']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }

            if ($activity->name === 'EQUIPAMIENTO AUDIOVISUAL') {
                $subactivities = [
                    ['name' => 'AUDIO'],
                    ['name' => 'CAMARAS FOTOGRAFICAS, LENTES Y VIDEOCAMARAS']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }

            if ($activity->name === 'EVENTOS') {
                $subactivities = [
                   ['name' => 'ALQUILER DE CARPAS'],
                   ['name' => 'ALQUILER DE DISPENSER/MAQUINAS DE CAFE'],
                   ['name' => 'BAÑOS QUIMICOS'],
                   ['name' => 'CLIMATIZACION'],
                   ['name' => 'EQUIPAMIENTO, SONIDO E ILUMINACION'],
                   ['name' => 'FILMACION Y FOTOGRAFIA'],
                   ['name' => 'MAQUINARIAS'],
                   ['name' => 'MOBILIARIO'],
                   ['name' => 'ORGANIZACION INTEGRAL'],
                   ['name' => 'SALONES'],
                   ['name' => 'SERVICIO DE STREAMING'],
                   ['name' => 'Servicios de seguridad']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }

            if ($activity->name === 'GASTRONOMIA') {
                $subactivities = [
                    ['name' => 'ABASTECIMIENTO AL POR MAYOR'],
                    ['name' => 'CAFE/HELADOS/BEBIDAS'],
                    ['name' => 'CATERING'],
                    ['name' => 'MERCADOS, KIOSCOS Y AUTOSERVICIOS'],
                    ['name' => 'PANADERIA'],
                    ['name' => 'RESTAURANTE, BAR Y CAFETERIA'],
                    ['name' => 'VIANDAS']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }



            if ($activity->name === 'HOTELERIA') {
                $subactivities = [
                    ['name' => 'ALOJAMIENTO']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }

            if ($activity->name === 'IMPRENTA') {
                $subactivities = [
                    ['name' => 'ADISEÑO Y CARTELERIA'],
                    ['name' => 'AFOTOCOPIAS'],
                    ['name' => 'AGRANDES IMPRENTAS'],
                    ['name' => 'APEQUEÑAS IMPRENTAS']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }


            
            if ($activity->name === 'INFORMATICA') {
                $subactivities = [
                    ['name' => 'ACCESORIOS'],
                    ['name' => 'ALQUILER DE IMPRESORAS'],
                    ['name' => 'HARDWARE'],
                    ['name' => 'SOFTWARE'],
                    ['name' => 'SOLUCIONES INFORMATICAS']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }

            if ($activity->name === 'INSTITUCIONES EDUCATIVAS') {
                $subactivities = [
                    ['name' => 'CENTROS DE ESTUDIOS / CAPACITACIÓN'],
                    ['name' => 'UNIVERSIDADES']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }

            if ($activity->name === 'INSTRUMENTOS MUSICALES') {
                $subactivities = [
                    ['name' => 'ARTICULOS VARIOS'],
                    ['name' => 'CUERDAS'],
                    ['name' => 'INSUMOS DE LUTHERIA'],
                    ['name' => 'PERCUSION'],
                    ['name' => 'VIENTOS']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }

            if ($activity->name === 'LIBROS') {
                $subactivities = [
                    ['name' => 'EDITORIALES'],
                    ['name' => 'LIBRERIAS']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }

            if ($activity->name === 'LOGISTICA') {
                $subactivities = [
                    ['name' => 'ALMACENAMIENTO Y DISTRIBUCION'],
                    ['name' => 'MENSAJERIA Y CADETERIA'],
                    ['name' => 'MUDANZAS Y FLETES']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }

            if ($activity->name === 'MANTENIMIENTO Y SERVICIOS AFINES') {
                $subactivities = [
                    ['name' => 'ASEO Y LIMPIEZA'],
                    ['name' => 'CARPINTERIA'],
                    ['name' => 'CERRAJERIA'],
                    ['name' => 'ELECTRICISTA'],
                    ['name' => 'EQUIPOS DE AIRE ACONDICIONADO'],
                    ['name' => 'FUMIGACIÓN'],
                    ['name' => 'GASISTA'],
                    ['name' => 'LIMPIEZA DE TANQUES'],
                    ['name' => 'PINTOR'],
                    ['name' => 'PINTURERIAS'],
                    ['name' => 'PLOMERIA'],
                    ['name' => 'SERVICIOS GENERALES (LUZ, AGUA, GAS)']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }

            if ($activity->name === 'MARKETING-ENCUESTAS') {
                $subactivities = [
                    ['name' => 'MARKETING-ENCUESTAS']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }

            
            if ($activity->name === 'MERCHANDISING') {
                $subactivities = [
                    ['name' => 'BOLSAS DE TELA / FRISELINA'],
                    ['name' => 'VARIOS']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }

            if ($activity->name === 'MOBILIARIO') {
                $subactivities = [
                    ['name' => ' ALQUILER DE BAÑOS'],
                    ['name' => 'ESTANTERIAS / PERSIANAS METALICAS'],
                    ['name' => 'MEDICO'],
                    ['name' => 'MUEBLES'],
                    ['name' => 'OFICINAS MOVILES / CONTAINER']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }

            if ($activity->name === 'OBRA Y CONSTRUCCION') {
                $subactivities = [
                    ['name' => 'CONSTRUCTORAS'],
                    ['name' => 'ONTAINERS / MODULOS'],
                    ['name' => 'DECORACIÓN'],
                    ['name' => 'DEMOLICIONES'],
                    ['name' => 'HERRERÍA'],
                    ['name' => 'IMPERMEABILIZACIÓN'],
                    ['name' => 'MATERIALES'],
                    ['name' => 'PERFORACIONES Y SERVICIOS CONEXOS'],
                    ['name' => 'SISTEMAS DE ELEVACION (ASCENSOR)'],
                    ['name' => 'TERMOMECANICA (AIRE ACONDICIONADO)']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }

            if ($activity->name === 'SALUD') {
                $subactivities = [
                    ['name' => 'EQUIPAMIENTO MOBILIARIO'],
                    ['name' => 'EQUIPAMIENTO TECNOLOGICO'],
                    ['name' => 'INSUMOS / FARMACIA'],
                    ['name' => 'SERVICIOS DE SOCORRISMO']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }

            if ($activity->name === 'SEGURIDAD Y CONTROL') {
                $subactivities = [
                    ['name' => 'CAJAS FUERTES / MUEBLES BLINDADOS Y ACCESORIOS'],
                    ['name' => 'CONTROL DE ACCESO Y VIDEOVIGILANCIA'],
                    ['name' => 'CONTROL DE INVENTARIOS (LECTORES-ETIQUETAS)'],
                    ['name' => 'ELEMENTOS DE SEGURIDAD PERSONAL'],
                    ['name' => 'FUGAS E INCENDIOS'],
                    ['name' => 'PERSONAL DE SEGURIDAD']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }

            if ($activity->name === 'SERVICIOS DE PUBLICIDAD') {
                $subactivities = [
                    ['name' => 'EN GENERAL'],
                    ['name' => 'GRABADOS']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }

          

            if ($activity->name === 'SERVICIOS INMOBILIARIOS') {
                $subactivities = [
                    ['name' => 'ALQUIER'],
                    ['name' => 'TASACIONES'],
                    ['name' => 'VENTA']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }

            if ($activity->name === 'SERVICIOS PROFESIONALES Y CONSULTORIA') {
                $subactivities = [
                    ['name' => 'ACTIVIDADES ARTISTICAS Y CULTURALES'],
                    ['name' => 'ARQUITECTO'],
                    ['name' => 'ASESORAMIENTO SOBRE GESTION/EJECUCION'],
                    ['name' => 'AUDITORIA'],
                    ['name' => 'COMUNICACION Y RRHH'],
                    ['name' => 'CORRECTOR'],
                    ['name' => 'DEPORTES'],
                    ['name' => 'DESGRABACIONES'],
                    ['name' => 'DIGITALIZACION'],
                    ['name' => 'ENSAYOS Y ANALISIS'],
                    ['name' => 'ESTUDIOS E INVESTIGACIONES'],
                    ['name' => 'GESTION DE COBRANZAS / FINANZAS'],
                    ['name' => 'INFORMATICA Y TECNOLOGIA'],
                    ['name' => 'INGENIERO CIVIL'],
                    ['name' => 'INSPECCIÓN Y AUDITORIA'],
                    ['name' => 'LEGALES / ABOGADO'],
                    ['name' => 'LOGISTICA'],
                    ['name' => 'MEDICINA LABORAL'],
                    ['name' => 'TRADUCTORES']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }


            if ($activity->name === 'TELEFONIA Y COMUNICACIONES') {
                $subactivities = [
                    ['name' => 'ALQUILER DE EQUIPOS'],
                    ['name' => 'COMPRA DE EQUIPAMIENTO'],
                    ['name' => 'INSTALACIONES'],
                    ['name' => 'SERVICIOS DE TELECOMUNICACION']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }

            if ($activity->name === 'TEXTILES') {
                $subactivities = [
                    ['name' => 'ALFOMBRAS/TAPICERÍA'],
                    ['name' => 'INDUMENTARIA'],
                    ['name' => 'LONAS (CORTES, INFLABLES Y GAZEBOS)'],
                    ['name' => 'TELAS'],
                    ['name' => 'UNIFORMES DE TRABAJO']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }


            if ($activity->name === 'TRANSPORTE') {
                $subactivities = [
                    ['name' => 'ESCOLARES'],
                    ['name' => 'FLETES Y ACARREOS'],
                    ['name' => 'FLUVIAL'],
                    ['name' => 'PASAJEROS']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }

            if ($activity->name === 'VEHICULOS') {
                $subactivities = [
                    ['name' => 'CONCESIONARIAS'],
                    ['name' => 'REPUESTOS']
                ];

                foreach ($subactivities as $subactivityData) {
                    $subactivityData['parent_id'] = $activity->id;
                    Activity::create($subactivityData);
                }
            }



        }
    }
}
