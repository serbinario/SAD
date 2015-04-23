
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
            'serbinario_sad_bundle_sadbundle_candidato[cpfcandidato]': {
                validators: {
                    notEmpty: {
                        message: "Este campo é obrigatório",
                    },
                },
            },
            'serbinario_sad_bundle_sadbundle_candidato[rgcandidato]': {
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
            'serbinario_sad_bundle_sadbundle_candidato[cepcandidato]': {
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
            'serbinario_sad_bundle_sadbundle_candidato[emailcandidato]': {
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
            'serbinario_sad_bundle_sadbundle_candidato[cnhcandidato]': {
                validators: {
                    notEmpty: {
                        message: "Este campo é obrigatório",
                    },
                },
            },
            'serbinario_sad_bundle_sadbundle_candidato[objCnh][categoriacnh]': {
                validators: {
                    notEmpty: {
                        message: "Este campo é obrigatório",
                    },
                },
            },
            'serbinario_sad_bundle_sadbundle_candidato[objCnh][validadecnh]': {
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
