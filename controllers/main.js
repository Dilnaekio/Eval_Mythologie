let deletion_button = document.querySelector(".suppression_btn_js");
let test = deletion_button.getAttribute("value");
console.log(test);

function deleteArticleJs(id) {
    console.log("coucou");
    if (confirm("Etes-vous sûr de vouloir supprimer cet article ?")) {
        return fetch(`../BDD/delete_article.php?id_article=${id}`, {
            method: "DELETE"
        })
    }
}



deletion_button.addEventListener("click", deleteArticleJs(test));

