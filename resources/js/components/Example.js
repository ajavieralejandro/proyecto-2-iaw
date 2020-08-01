import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import SearchComponent from "./Search/search.component";
import CursoComponent from "./Cursos/cursos.component";
const token = document.getElementById("api_token").content;
//buildpack deploy
function Example() {
    useEffect(() => {
        console.log("Estoy trayendo : ", token);
        fetch("http://localhost:8000/api/cursos2", {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                Authorization: "Bearer " + token
            }
        })
            .then(res => res.json())
            .then(
                result => {
                    console.log("Estoy trayendo : ", result);
                },
                // Nota: es importante manejar errores aquí y no en
                // un bloque catch() para que no interceptemos errores
                // de errores reales en los componentes.
                error => {
                    console.log("Hubo un error");
                }
            );
    }, []);

    return (
        <div className="container">
            <SearchComponent />
            <CursoComponent />
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Example Component</div>

                        <div className="card-body">
                            Estoy haciendo cambios 2.1.1
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Example;

if (document.getElementById("example")) {
    ReactDOM.render(<Example />, document.getElementById("example"));
}
