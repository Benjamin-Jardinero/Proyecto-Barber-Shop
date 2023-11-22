//Obtenemos la constante tienda
const tienda = document.getElementById("tienda-online");

//Creamos un forEach para recorrer todos los productos

productos.forEach((producto)=>{
    const div = document.createElement("div");
    div.classList.add("tienda-producto");
    div.innerHTML = `
        <img src="${producto.img}" alt="Imagenes">
        <div>
            <h3>${producto.nombre}</h3>
            <p>$${producto.precio}</p>
        </div>
    `;
    tienda.appendChild(div);
});