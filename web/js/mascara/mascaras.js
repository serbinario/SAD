$(document).ready(function(){
    
    //######## Mascaras para formulário candidato ##########
    
    //Cpf
    $('#serbinario_sad_bundle_sadbundle_candidato_cpfcandidato').mask('000.000.000-00', {reverse: true});
    //RG
    $('#serbinario_sad_bundle_sadbundle_candidato_rgcandidato').mask('0.000.000', {reverse: true});
    //CEP
    $('#serbinario_sad_bundle_sadbundle_candidato_cepcandidato').mask('00000-000');
    //money
     $('#serbinario_sad_bundle_sadbundle_candidato_curriculo_prentencaosalarialcurriculo').mask('000.000.000,00', {reverse: true});
     
    //######## Mascaras para formulário empreendedor ##########
    
    //money
     $('#serbinario_sad_bundle_sadbundle_empreendedor_outrarendaempreendedor').mask('000.000.000,00', {reverse: true});
     
     //######## Mascaras para formulário autônomo ##########
    
    //money
     $('#serbinario_sad_bundle_sadbundle_autonomo_outrarendaautonomo').mask('000.000.000,00', {reverse: true});
     
     //Vaga disponível
     $('#serbinario_sad_bundle_sadbundle_vagasdisponiveis_qtdVagas').mask('0000000000000000000', {reverse: true});
});