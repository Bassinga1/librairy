const addFormToCollection = (e) => {
    // On récupère l'ul qui contient la collection de formulaires dynamiques
    const collectionHolder = document.querySelector('.' + e.currentTarget.dataset.collectionHolderClass);
    // On crée un li, qui contiendra le prototype du formulaire
    const item = document.createElement('li');
    // On ajouter dans l'html de la li l'html du prototype de formulaire des images contenu dans l'attribut data-prototype
    // de l'ul.
    // On remplace les __name__ par le numéro de l'index de la collection (l'attribut data-index de l'ul)
    item.innerHTML = collectionHolder
        .dataset
        .prototype
        .replace(
            /__name__/g,
            collectionHolder.dataset.index
        );
    // On ajoute un bouton de suppression
    collectionHolder.appendChild(item);
    // On récupère l'input de type type file dans la li afin d'initialiser son écouteur d'evenement
    collectionHolder.dataset.index++;
};

document
    .querySelectorAll('.add_item_link')
    .forEach(btn => {
        btn.addEventListener("click", addFormToCollection)
    });