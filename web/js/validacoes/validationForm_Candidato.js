
$(document).ready(function () {

    $('.form-horizontal').bootstrapValidator({
        excluded: [':disabled'],
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            'serbinario_sad_bundle_sadbundle_candidato[nomecandidato]': {
                validators: {
                    notEmpty: {
                        message: "Este campo é obrigatório",
                    },
                },
            },
            'serbinario_sad_bundle_sadbundle_candidato[enderecocadidato]': {
                validators: {
                    notEmpty: {
                        message: "Este campo é obrigatório",
                    },
                },
            },
            'serbinario_sad_bundle_sadbundle_candidato[bairrocandidato]': {
                validators: {
                    notEmpty: {
                        message: "Este campo é obrigatório",
                    },
                },
            },
            'serbinario_sad_bundle_sadbundle_candidato[cidadecandidato]': {
                validators: {
                    notEmpty: {
                        message: "Este campo é obrigatório",
                    },
                },
            },
            'serbinario_sad_bundle_sadbundle_candidato[ufcandidato]': {
                validators: {
                    notEmpty: {
                        message: "Este campo é obrigatório",
                    },
                },
            },
            'serbinario_sad_bundle_sadbundle_candidato[nascimentocandidato]': {
                validators: {
                    notEmpty: {
                        message: "Este campo é obrigatório",
                    },
                },
            },
            'serbinario_sad_bundle_sadbundle_candidato[sexosexo]': {
                validators: {
                    notEmpty: {
                        message: "Este campo é obrigatório",
                    },
                },
            },
            'serbinario_sad_bundle_sadbundle_candidato[estadocivilestadocivil]': {
                validators: {
                    notEmpty: {
                        message: "Este campo é obrigatório",
                    },
                },
            },
            'serbinario_sad_bundle_sadbundle_candidato[outrasinformacoescandidato]': {
                validators: {
                    notEmpty: {
                        message: "Este campo é obrigatório",
                    },
                },
            },   
        }
    });
});
