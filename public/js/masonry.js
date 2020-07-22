const masonryLayout = (containerElem, itemElems, columns) => {
    console.log("Item elemens es : ");
    console.log(itemElems);
    containerElem.classList.add("masonry-layout", `columns-${columns}`);
    let columnsElements = [];
    for (let i = 0; i < columns; i++) {
        let column = document.createElement("div");
        column.classList.add("masonry-column", `column-${i}`);
        console.log("Creo que llego hasta acá sin problemas");
        containerElem.appendChild(column);
        columnsElements.push(column);
    }

    for (let m = 0; m < Math.ceil(itemElems.length / columns); m++) {
        for (let n = 0; n < columns; n++) {
            let aux = document.createElement("div");
            columnsElements[n].appendChild(itemElems[m * columns + n]);
        }
    }
};

masonryLayout(
    document.getElementById("gallery"),
    document.querySelectorAll(".gallery-item"),
    4
);
console.log("Eh finalizado correctamente");
