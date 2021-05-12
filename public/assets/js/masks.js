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
