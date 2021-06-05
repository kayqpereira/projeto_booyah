// Mascara dos campos ex: (00) 00000-0000
const masks = {
    string(value) {
        return value
            .replace(/[^a-záàâãéèêíïóôõöúçñ ]/gi, "");
    },

    cpf(value) {
        return value
            .replace(/\D+/g, "")
            .replace(/(\d{3})(\d)/, "$1.$2")
            .replace(/(\d{3})(\d)/, "$1.$2")
            .replace(/(\d{3})(\d{1,2})/, "$1-$2")
            .replace(/(-\d{2})\d+?$/, "$1");
    },

    telefone(value) {
        return value
            .replace(/\D+/g, "")
            .replace(/(\d{2})(\d)/, "($1) $2")
            .replace(/(\d{4})(\d)/, "$1-$2")
            .replace(/(-\d{4})\d+?$/, "$1");
    },

    celular(value) {
        return value
            .replace(/\D+/g, "")
            .replace(/(\d{2})(\d)/, "($1) $2")
            .replace(/(\d{4})(\d)/, "$1-$2")
            .replace(/(\d{4})-(\d)(\d{4})/, "$1$2-$3")
            .replace(/(-\d{4})\d+?$/, "$1");
    },

    data(value) {
        return value
            .replace(/\D+/g, "")
            .replace(/(\d{2})(\d)/, "$1/$2")
            .replace(/(\d{2})(\d)/, "$1/$2")
            .replace(/(\/\d{4})\d+?$/, "$1");
    },

    cep(value) {
        return value
            .replace(/\D+/g, "")
            .replace(/(\d{5})(\d)/, "$1-$2")
            .replace(/(-\d{3})\d+?$/, "$1");
    },

    estoque(value) {
        return value
            .replace(/\D+/g, "")
            .replace(/(\d{6})\d+?$/, "$1");
    },
}

// Adicionando as mascaras aos campos
document.querySelectorAll("input").forEach($input => {

    if ($input.dataset.mask) {
        const field = $input.dataset.mask;

        $input.addEventListener("input", event => {
            event.target.value = masks[field](event.target.value);
        }, false);
    }
})

const msgSenha = "A senha deve conter no mínimo 8 dígitos, um número, uma letra minúscula, uma letra minúscula e um carácter especial, ex: $#%.";

function validaSenha(senha) {
    const re = /^(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,}$/gm;
    return re.test(senha);
}

function validaEmail(email) {
    const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return re.test(email.value);
}

const validate = {
    padrao(element) {
        element.value = trim(element.value);
        element.value = trim2(element.value);
        if (element.value === "") {
            let error = "Este campo é obrigatório.";
            setMessage(error, element);
            return false;
        } else {
            setMessage("", element);
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
            if (document.getElementById("cod_cliente"))
                var cod_cliente = document.getElementById("cod_cliente").value;
            else
                var cod_cliente = "";
            $(document).ready(function () {

                $.ajax({
                    url: "index.php?classe=ClienteController&metodo=verificarCpf",
                    type: "POST",
                    data: {
                        "cpf": cpf.value,
                        "cod_cliente": cod_cliente
                    },
                    dataType: "json",
                    beforeSend: function () {
                        load(cpf, "open");
                    },

                    success: function (callback) {
                        setMessage(callback.erro, cpf);
                    },

                    error: function () {
                        alert("Ocorreu um erro ao realizar a requisição!");
                    },

                    complete: function () {
                        load(cpf, "close");
                    }
                });
            });
            return true;
        }

        function validaCPF(strCPF) {
            var Soma,
                Resto;

            Soma = 0;

            strCPF = strCPF.value.replace(/\D/g, "");

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

            for (let i = 1; i <= 9; i++)
                Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
            Resto = (Soma * 10) % 11;
            if ((Resto == 10) || (Resto == 11))
                Resto = 0;
            if (Resto != parseInt(strCPF.substring(9, 10)))
                return false;
            Soma = 0;
            for (let i = 1; i <= 10; i++)
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
                let error = "Telefone inválido, por favor, digite o DDD junto com o número.";
                setMessage(error, telefone);
                return false;
            } else {
                setMessage("", telefone);
                return true;
            }
        } else {
            let error = "nulo";
            setMessage(error, telefone);
            return true;
        }

        function validaTelefone(telefone) {
            const re = new RegExp("^\\(((1[1-9])|([2-9][0-9]))\\) (([2-5]{1}[0-9]{3}-[0-9]{4}))$");
            return re.test(telefone);
        }
    },

    celular(celular) {
        if (celular.value == "") {
            let error = "Este campo é obrigatório.";
            setMessage(error, celular);
            return false;
        } else if (!validaCelular(celular.value)) {
            let error = "Número de celular inválido, por favor, digite o DDD + nono dígito + número.";
            setMessage(error, celular);
            return false;
        } else {
            setMessage("", celular);
            return true;
        }

        function validaCelular(celular) {
            const re = new RegExp("^\\(((1[1-9])|([2-9][0-9]))\\) (([5-9]{1}[0-9]{4}-[0-9]{4}))$");
            return re.test(celular);
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

            let quantosAnos = anoAtual - anoNasc;

            if (mesAtual < mesNasc || mesAtual == mesNasc && diaAtual < diaNasc) {
                quantosAnos--;
            }

            return quantosAnos < 0 ? 0 : quantosAnos;
        }

        function validaData(dataNascimento) {
            const dataNasc = dataNascimento.value;

            const re = /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]|(?:Jan|Mar|May|Jul|Aug|Oct|Dec)))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2]|(?:Jan|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec))\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)(?:0?2|(?:Feb))\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9]|(?:Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep))|(?:1[0-2]|(?:Oct|Nov|Dec)))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/;

            if (!re.test(dataNasc)) {
                return false;
            }

            let dataDividida = dataNasc.split("/"),
                dia = dataDividida[0],
                mes = dataDividida[1],
                ano = dataDividida[2];

            let dataAtual = new Date(),
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
        const cepValue = cep.value.replace(/\D/g, "");

        if (cepValue == "") {
            let error = "Este campo é obrigatório.";
            setMessage(error, cep);
            return false;
        } else if (cepValue.length < 8) {
            let error = "Por favor, informe um CEP que seja válido.";
            setMessage(error, cep);
            return false;
        } else {
            $(document).ready(function () {
                $.ajax({
                    url: "https://viacep.com.br/ws/" + cepValue + "/json",
                    type: "GET",
                    dataType: "json",
                    beforeSend: function () {
                        load(cep, "open");
                    },

                    success: function (callback) {
                        if (callback.erro) {
                            return false;
                        }

                        if (callback.uf !== "") {
                            $("#estado").val(callback.uf);
                            validate["padrao"](document.getElementById("estado"))
                        }

                        if (callback.localidade !== "") {
                            $("#cidade").val(callback.localidade);
                            validate["padrao"](document.getElementById("cidade"))
                        }

                        if (callback.logradouro !== "") {
                            $("#endereco").val(callback.logradouro);
                            validate["padrao"](document.getElementById("endereco"))
                        }

                        if (callback.bairro !== "") {
                            $("#bairro").val(callback.bairro);
                            validate["padrao"](document.getElementById("bairro"))
                        }
                    },

                    error: function () {
                        alert("Ocorreu um erro ao realizar a requisição!");
                    },

                    complete: function () {
                        load(cep, "close");
                        setMessage("", cep);
                    }
                });
            });
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
            setMessage(error, email);
            return false;
        } else if (!validaEmail(email)) {
            let error = "Formato de email inválido, por favor, informe um email válido.";
            setMessage(error, email);
            return false;
        } else {
            if (document.getElementById("cod_cliente"))
                var cod_cliente = document.getElementById("cod_cliente").value;
            else
                var cod_cliente = "";
            $(document).ready(function () {

                $.ajax({
                    url: "index.php?classe=ClienteController&metodo=verificarEmail",
                    type: "POST",
                    data: {
                        "email": email.value,
                        "cod_cliente": cod_cliente
                    },
                    dataType: "json",
                    beforeSend: function () {
                        load(email, "open");
                    },

                    success: function (callback) {
                        setMessage(callback.erro, email);
                    },

                    error: function () {
                        alert("Ocorreu um erro ao realizar a requisição!");
                    },

                    complete: function () {
                        load(email, "close");
                    }
                });
            });
            if (document.getElementById("confirmar_email").value !== "")
                validate["confirmar_email"](document.getElementById("confirmar_email"))
            return true;
        }
    },

    confirmar_email(email) {
        if (email.value == "") {
            let error = "Por favor, digite o seu e-mail.";
            setMessage(error, email);
            return false;
        } else if (!validaEmail(email)) {
            let error = "Formato de email inválido, por favor, informe um email válido.";
            setMessage(error, email);
            return false;
        } else if (email.value != document.getElementById("email").value) {
            let error = "Os emails não correspondem, por favor, digite-os novamente.";
            setMessage(error, email);
            return false;
        } else {
            setMessage("", email);
            return true;
        }
    },

    senha(senha) {
        if (senha.value == "") {
            let error = "Por favor, digite uma senha.";
            setMessage(error, senha);
            return false;
        } else if (!validaSenha(senha.value)) {
            let error = msgSenha;
            setMessage(error, senha);
            return false;
        } else {
            setMessage("", senha);
            if (document.getElementById("confirmar_senha").value != "")
                validate["confirmar_senha"](document.getElementById("confirmar_senha"));
            return true;
        }
    },

    confirmar_senha(senha) {
        if (validaSenha(document.getElementById("senha").value)) {
            if (senha.value == "") {
                let error = "Por favor, confirma senha.";
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
        } else { return false; }
    },

    nova_senha(senha) {
        if (senha.value != "") {
            if (!validaSenha(senha.value)) {
                let error = msgSenha;
                setMessage(error, senha);
                return false;
            } else {
                setMessage("", senha);
                if (document.getElementById("confirmar_nova_senha").value != "")
                    validate["confirmar_nova_senha"](document.getElementById("confirmar_nova_senha"));
                return true;
            }
        } else {
            let error = "nulo";
            setMessage(error, telefone);
            return true;
        }
    },

    confirmar_nova_senha(senha) {
        if (document.getElementById("nova_senha").value != "") {
            if (senha.value == "") {
                let error = "Por favor, confirme a senha.";
                setMessage(error, senha);
                return false;
            } else if (senha.value != document.getElementById("nova_senha").value) {
                let error = "As senhas informados não correspondem, por favor, digite-as novamente.";
                setMessage(error, senha);
                return false;
            } else {
                setMessage("", senha);
                return true;
            }
        } else {
            let error = "nulo";
            setMessage(error, telefone);
            return true;
        }
    },

    estoque(estoque) {
        if (estoque.value == "") {
            let error = "Este campo é obrigatório.";
            setMessage(error, estoque);
            return false;
        } else if (parseInt(estoque.value) <= 0) {
            let error = "Estoque deve ser maior que 0.";
            setMessage(error, estoque);
            return false;
        } else {
            setMessage("", estoque);
            return true;
        }
    },

    preco(preco) {
        if (preco.value == "") {
            let error = "Este campo é obrigatório.";
            setMessage(error, preco);
            return false;
        } else if (parseFloat(preco.value) <= 0) {
            let error = "O preço deve ser maior que 0.";
            setMessage(error, preco);
            return false;
        } else {
            setMessage("", preco);
            return true;
        }
    },
};

// Adiciona o evento change e um função correspondente a todos os campos 
document.querySelectorAll(".form-control").forEach(field => {
    const id = field.id;

    if ((id == "nome") ||
        (id == "sobrenome") ||
        (id == "bairro") ||
        (id == "endereco") ||
        (id == "numero") ||
        (id == "cidade") ||
        (id == "estado") ||
        (id == "nome_produto") ||
        (id == "destaque") ||
        (id == "ativo") ||
        (id == "cod_categoria") ||
        (id == "cod_marca") ||
        (id == "nome_categoria") ||
        (id == "nome_marca")) {
        field.addEventListener("change", event => {
            event.target = validate["padrao"](event.target);
        }, false);
    } else {
        field.addEventListener("change", event => {
            event.target = validate[id](event.target);
        }, false);
    }
});

function validarForm() {
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

    if (!validate["confirmar_email"](document.getElementById("confirmar_email"))) {
        document.getElementById("confirmar_email").focus();
        return false;
    }

    if (document.getElementById("frmCadastroCli")) {
        if (!validate["senha"](document.getElementById("senha"))) {
            document.getElementById("senha").focus();
            return false;
        }

        if (!validate["confirmar_senha"](document.getElementById("confirmar_senha"))) {
            document.getElementById("confirmar_senha").focus();
            return false;
        }
    } else {
        if (!validate["nova_senha"](document.getElementById("nova_senha"))) {
            document.getElementById("nova_senha").focus();
            return false;
        }

        if (!validate["confirmar_nova_senha"](document.getElementById("confirmar_nova_senha"))) {
            document.getElementById("confirmar_nova_senha").focus();
            return false;
        }
    }
}

function validarFormEnd() {
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

    if (!validate["padrao"](document.getElementById("cidade"))) {
        document.getElementById("cidade").focus();
        return false;
    }

    if (!validate["padrao"](document.getElementById("estado"))) {
        document.getElementById("estado").focus();
        return false;
    }
}

function validarFormMar() {
    if (!validate["padrao"](document.getElementById("nome_marca"))) {
        document.getElementById("nome_marca").focus();
        return false;
    }
}

function validarFormCateg() {
    if (!validate["padrao"](document.getElementById("nome_categoria"))) {
        document.getElementById("nome_categoria").focus();
        return false;
    }
}

function validarFormProd() {
    if (!validate["padrao"](document.getElementById("nome_produto"))) {
        document.getElementById("nome_produto").focus();
        return false;
    }

    if (!validate["padrao"](document.getElementById("destaque"))) {
        document.getElementById("destaque").focus();
        return false;
    }

    if (!validate["padrao"](document.getElementById("ativo"))) {
        document.getElementById("ativo").focus();
        return false;
    }

    if (!validate["estoque"](document.getElementById("estoque"))) {
        document.getElementById("estoque").focus();
        return false;
    }

    if (!validate["preco"](document.getElementById("preco"))) {
        document.getElementById("preco").focus();
        return false;
    }

    if (!validate["padrao"](document.getElementById("cod_categoria"))) {
        document.getElementById("cod_categoria").focus();
        return false;
    }

    if (!validate["padrao"](document.getElementById("cod_marca"))) {
        document.getElementById("cod_marca").focus();
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

function trim2(str) {
    return str
        .replace(/[ ]/g, "<>")
        .replace(/></g, "")
        .replace(/<>/g, " ");
}

function goBack() {
    window.history.back();
}

function load(field, action) {
    let load = field.parentNode.querySelector("div.load");

    if (action === "open") {
        setMessage("nulo", field);
        load.classList.add("is-rotating");
    } else {
        load.classList.remove("is-rotating");
    }
}

if (document.getElementById("frmEditarCli"))
    document.getElementById("frmEditarCli").onload = validarForm();
else if (document.getElementById("frmEditarEnd"))
    document.getElementById("frmEditarEnd").onload = validarFormEnd();
else if (document.getElementById("frmEditarProd"))
    document.getElementById("frmEditarProd").onload = validarFormProd();

$(document).ready(function () {
    if (document.querySelector(".tabela")) {
        $(".tabela").DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
            },
            "scrollX": true,
        });
    }
});

const link = document.querySelectorAll(".nav-link");
const dropdownItem = document.querySelectorAll(".dropdown-item");
const urlAtual = location.href;

if (link) {
    link.forEach(l => l.parentNode.classList.remove("active"));

    for (let i = 0; i < link.length; i++) {
        if (link[i].href === urlAtual)
            link[i].parentNode.classList.add("active");
    }

    if (dropdownItem) {
        dropdownItem.forEach(l => l.parentNode.parentNode.classList.remove("active"));
        for (let i = 0; i < dropdownItem.length; i++) {
            if (dropdownItem[i].href === urlAtual)
                dropdownItem[i].parentNode.parentNode.classList.add("active");
        }
    }
}