<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once FCPATH . 'vendor/autoload.php';

use Mpdf\Mpdf;

class Pdf {

    public function gerar_certificado($nome, $titulo, $descricao, $arquivo, $data_emissao = null){

        if (!$data_emissao) {
            $data_emissao = date('d/m/Y');
        } else {
            $data_emissao = date('d/m/Y', strtotime($data_emissao));
        }

        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4-L',
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_top' => 0,
            'margin_bottom' => 0,
            'default_font' => 'dejavusans'
        ]);

        $mpdf->SetDisplayMode('fullpage');

$html = '

<html>
<head>

<style>

@page{
    margin:0;
}

html,body{
    margin:0;
    padding:0;
}

/* CONTAINER DO CERTIFICADO */

.certificado{

    width:100%;
    height:100%;

    background:#05070d;

    border:8px solid #00f7ff;

    box-sizing:border-box;

    padding:90px;

    color:#e6faff;

    font-family: DejaVu Sans, Arial;

}

/* TITULO */

.titulo{

    text-align:center;

    font-size:48px;

    font-weight:bold;

    color:#00f7ff;

    letter-spacing:3px;

}

/* LINHA DECORATIVA */

.linha{

    width:260px;

    height:2px;

    background:#00f7ff;

    margin:35px auto;

}

/* SUB */

.sub{

    text-align:center;

    font-size:20px;

    color:#9adfff;

}

/* NOME */

.nome{

    text-align:center;

    font-size:44px;

    font-weight:bold;

    color:#a855f7;

    margin:35px 0;

}

/* DESCRIÇÃO */

.descricao{

    text-align:center;

    font-size:22px;

    margin:0 200px;

    line-height:1.6;

}

/* BADGE */

.selo-box{

    text-align:center;

    margin-top:60px;

}

.selo{

    display:inline-block;

    border:2px solid #00f7ff;

    color:#00f7ff;

    padding:14px 45px;

    font-size:16px;

    letter-spacing:3px;

}

/* RODAPE */

.rodape{

    margin-top:120px;

    font-size:15px;

    color:#9adfff;

}

.letra{
    color:white;
}

</style>

</head>

<body>

<div class="certificado">

    <div class="titulo">'.$titulo.'</div>

    <div class="linha"></div>

    <div class="sub">Certificamos que</div>

    <div class="nome">'.$nome.'</div>

    <div class="descricao">'.$descricao.'</div>

    <div class="selo-box">
        <div class="selo">CONQUISTA DESBLOQUEADA</div>
    </div>

    <div class="rodape">

        <table width="100%" class="letra">
            <tr>
                <td align="left">Plataforma MathGame</td>
                <td align="right">Emitido em '.$data_emissao.'</td>
            </tr>
        </table>

    </div>

</div>

</body>
</html>

';

        $mpdf->WriteHTML($html);
        $mpdf->Output($arquivo,'F');
    }
}