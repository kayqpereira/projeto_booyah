const validate = {
    padrao(element) {
        element.value = trim(element.value)
        if (element.value == "") {
            let error = "Este campo é obrigatório.";
            setMessage(error, element)
            return false;
        } else {
            setMessage("", element)
            return true;
        }
    },

    cpf(cpf) {
        if (cpf.value == "") {
            let error = "Este campo é obrigatório.";
            setMessage(error, cpf);
            return false;
        } else if (!validaCPF(cpf)) {
            let error = "Por favor, informe um CPF válido.";
            setMessage(error, cpf);
            return false;
        } else {
            setMessage("", cpf);
            return true;
        }

        function validaCPF(strCPF) {
            var Soma;
            var Resto;
            Soma = 0;

            strCPF = strCPF.value.replace(/\D/g, "");

            console.log(strCPF);
            if (strCPF.length != 11 ||
                strCPF == "00000000000" ||
                strCPF == "11111111111" ||
                strCPF == "22222222222" ||
                strCPF == "33333333333" ||
                strCPF == "44444444444" ||
                strCPF == "55555555555" ||
                strCPF == "66666666666" ||
                strCPF == "77777777777" ||
                strCPF == "88888888888" ||
                strCPF == "99999999999")
                return false;

            for (i = 1; i <= 9; i++)
                Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
            Resto = (Soma * 10) % 11;
            if ((Resto == 10) || (Resto == 11))
                Resto = 0;
            if (Resto != parseInt(strCPF.substring(9, 10)))
                return false;
            Soma = 0;
            for (i = 1; i <= 10; i++)
                Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
            Resto = (Soma * 10) % 11;
            if ((Resto == 10) || (Resto == 11))
                Resto = 0;
            if (Resto != parseInt(strCPF.substring(10, 11)))
                return false;
            return true;
        }
    },

    telefone(telefone) {
        if (telefone.value != "") {
            if (!validaTelefone(telefone.value)) {
                let error = "Telefone inválido, por favor, digite o DDD junto número.";
                setMessage(error, telefone);
                return false;
            } else {
                setMessage("", telefone);
                return true;
            }
        } else {
            error = "nulo"
            setMessage(error, telefone);
            return true;
        }

        function validaTelefone(telefone) {
            const re = new RegExp('^\\(((1[1-9])|([2-9][0-9]))\\) (([2-5]{1}[0-9]{3}-[0-9]{4}))$');
            return re.test(telefone);;
        }
    },

    celular(celular) {
        if (celular.value == "") {
            let error = "Este campo é obrigatório.";
            setMessage(error, celular);
            return false;
        } else if (!validaCelular(celular.value)) {
            let error = "Número de celular inválido, por favor, digite o DDD junto número.";
            setMessage(error, celular);
            return false;
        } else {
            setMessage("", celular);
            return true;
        }

        function validaCelular(celular) {
            const re = new RegExp('^\\(((1[1-9])|([2-9][0-9]))\\) (([5-9]{1}[0-9]{4}-[0-9]{4}))$');
            return re.test(celular);;
        }
    },

    data_nasc(dataNascimento) {
        if (dataNascimento.value == "") {
            let error = "Este campo é obrigatório.";
            setMessage(error, dataNascimento);
            return false;
        } else if (!validaData(dataNascimento)) {
            let error = "Por favor, informe uma data de nascimento válida.";
            setMessage(error, dataNascimento);
            return false;
        } else if (validaIdade(dataNascimento) < 18) {
            let error = "Para se cadastrar é preciso ser maior de idade.";
            setMessage(error, dataNascimento);
            return false;
        } else {
            setMessage("", dataNascimento);
            return true;
        }

        function validaIdade(dataNascimento) {
            const dataNasc = dataNascimento.value,
                dataDividida = dataNasc.split("/");

            let diaNasc = dataDividida[0],
                mesNasc = dataDividida[1],
                anoNasc = dataDividida[2];

            let dataAtual = new Date,
                anoAtual = dataAtual.getFullYear(),
                mesAtual = dataAtual.getMonth() + 1,
                diaAtual = dataAtual.getDate();

            anoNasc = +anoNasc;
            mesNasc = +mesNasc;
            diaNasc = +diaNasc;

            quantosAnos = anoAtual - anoNasc;

            if (mesAtual < mesNasc || mesAtual == mesNasc && diaAtual < diaNasc) {
                quantosAnos--;
            }

            return quantosAnos < 0 ? 0 : quantosAnos;
        }


        function validaData(dataNascimento) {
            const dataNasc = dataNascimento.value;

            const re = /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]|(?:Jan|Mar|May|Jul|Aug|Oct|Dec)))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2]|(?:Jan|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec))\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)(?:0?2|(?:Feb))\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9]|(?:Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep))|(?:1[0-2]|(?:Oct|Nov|Dec)))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/

            if (!re.test(dataNasc)) {
                return false;
            }

            let dataDividida = dataNasc.split("/"),
                dia = dataDividida[0],
                mes = dataDividida[1],
                ano = dataDividida[2];

            dataAtual = new Date();
            data = new Date(ano, mes - 1, dia);

            if (data.getTime() > dataAtual.getTime()) {
                return false;
            }

            if (data.getFullYear() < (dataAtual.getFullYear() - 100)) {
                return false;
            }
            return true;
        }
    },

    cep(cep) {
        if (cep.value == "") {
            let error = "Este campo é obrigatório.";
            setMessage(error, cep);
            return false;
        } else if (cep.value.length < 9) {
            let error = "Por favor, informe um CEP que seja válido.";
            setMessage(error, cep);
            return false;
        } else {
            setMessage("", cep);
            return true;
        }
    },

    complemento(complemento) {
        if (complemento.value != "") {
            setMessage("", complemento);
        } else {
            setMessage("nulo", complemento);
        }
    },

    email(email) {
        if (email.value == "") {
            let error = "Por favor, digite o seu e-mail.";
            setMessage(error, email)
            return false;
        } else if (!validaEmail(email)) {
            let error = "Formato de email inválido, por favor, informe um email válido.";
            setMessage(error, email)
            return false;
        } else {
            setMessage("", email)
            return true;
        }

        function validaEmail(email) {
            const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return re.test(email.value);
        }
    },

    email_confirm(email) {
        if (email.value == "") {
            let error = "Por favor, digite o seu e-mail.";
            setMessage(error, email)
            return false;
        } else if (email.value != document.getElementById("email").value) {
            let error = "Os emails informados não correspondem, por favor, digite-os novamente.";
            setMessage(error, email)
            return false;
        } else {
            setMessage("", email)
            return true;
        }
    },

    senha(senha) {
        const msgSenha = "A senha deve conter no mínimo 8 dígitos, um número, uma letra minúscula, uma letra minúscula e um carácter especial, ex: $#%.";
        if (senha.value == "") {
            let error = "Por favor, digite uma senha.";
            setMessage(error, senha)
            return false;
        } else if (!validaSenha(senha.value)) {
            let error = msgSenha;
            setMessage(error, senha)
            return false;
        } else {
            setMessage("", senha)
            return true;
        }

        function validaSenha(senha) {
            const re = /^(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,}$/gm;
            return re.test(senha);
        }

    },

    senha_confirm(senha) {
        if (senha.value == "") {
            let error = "Por favor, confirm a senha.";
            setMessage(error, senha);
            return false;
        } else if (senha.value != document.getElementById("senha").value) {
            let error = "As senhas informados não correspondem, por favor, digite-as novamente.";
            setMessage(error, senha);
            return false;
        } else {
            setMessage("", senha);
            return true;
        }
    }
}

document.querySelectorAll(".form-control").forEach(field => {
    const id = field.id;

    if ((id == "nome") || (id == "sobrenome") || (id == "bairro") || (id == "endereco") || (id == "numero") || (id == "cidade") || (id == "estado")) {
        field.addEventListener("blur", event => {
            event.target = validate["padrao"](event.target);
        }, false);
    } else {
        field.addEventListener("blur", event => {
            event.target = validate[id](event.target);
        }, false);
    }
});


function validaForm() {
    if (!validate["padrao"](document.getElementById("nome"))) {
        document.getElementById("nome").focus();
        return false;
    }

    if (!validate["padrao"](document.getElementById("sobrenome"))) {
        document.getElementById("sobrenome").focus();
        return false;
    }

    if (!validate["cpf"](document.getElementById("cpf"))) {
        document.getElementById("cpf").focus();
        return false;
    }

    if (!validate["telefone"](document.getElementById("telefone"))) {
        document.getElementById("telefone").focus();
        return false;
    }

    if (!validate["celular"](document.getElementById("celular"))) {
        document.getElementById("celular").focus();
        return false;
    }

    if (!validate["data_nasc"](document.getElementById("data_nasc"))) {
        document.getElementById("data_nasc").focus();
        return false;
    }

    if (!validate["cep"](document.getElementById("cep"))) {
        document.getElementById("cep").focus();
        return false;
    }

    if (!validate["padrao"](document.getElementById("bairro"))) {
        document.getElementById("bairro").focus();
        return false;
    }

    if (!validate["padrao"](document.getElementById("endereco"))) {
        document.getElementById("endereco").focus();
        return false;
    }

    if (!validate["padrao"](document.getElementById("numero"))) {
        document.getElementById("numero").focus();
        return false;
    }

    if (!validate["padrao"](document.getElementById("cidade"))) {
        document.getElementById("cidade").focus();
        return false;
    }

    if (!validate["padrao"](document.getElementById("estado"))) {
        document.getElementById("estado").focus();
        return false;
    }

    if (!validate["email"](document.getElementById("email"))) {
        document.getElementById("email").focus();
        return false;
    }

    if (!validate["email_confirm"](document.getElementById("email_confirm"))) {
        document.getElementById("email_confirm").focus();
        return false;
    }

    if (!validate["senha"](document.getElementById("senha"))) {
        document.getElementById("senha").focus();
        return false;
    }

    if (!validate["senha_confirm"](document.getElementById("senha_confirm"))) {
        document.getElementById("senha_confirm").focus();
        return false;
    }

}

function setMessage(error, field) {
    const spanErrorMessage = document.querySelector(`span.error-${field.id}`);

    if (error == "nulo") {
        spanErrorMessage.classList.remove("is-active");
        field.classList.remove("is-invalid");
        field.classList.remove("is-valid");
    } else if (error == "") {
        spanErrorMessage.classList.remove("is-active");
        field.classList.remove("is-invalid");
        field.classList.add("is-valid");
    } else {
        spanErrorMessage.innerHTML = error;
        spanErrorMessage.classList.add("is-active");
        field.classList.remove("is-valid");
        field.classList.add("is-invalid");
    }
}

function trim(str) {
    return str.replace(/^\s+|\s+$/g, "");
}