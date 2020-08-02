import React, { useState, useEffect, useContext } from "react";
import { CursoContext } from "../../providers/curso.provider";
import Avatar from "@material-ui/core/Avatar";

const token = document.getElementById("api_token").content;

let Cursos = () => {
    const { toSearch, cursos, cursosFetched } = useContext(CursoContext);
    useEffect(() => {
        if (toSearch != "")
            //console.log("Estoy trayendo : ", token);
            fetch(
                "https://proyecto2-jaa.herokuapp.com/api/cursos?name=" +
                    `${toSearch}`,
                {
                    method: "GET",
                    headers: {
                        "Content-Type": "application/json",
                        Authorization: "Bearer " + token
                    }
                }
            )
                .then(res => res.json())
                .then(
                    result => {
                        console.log("Estoy trayendo : ", result);
                        cursosFetched(result);
                    },
                    // Nota: es importante manejar errores aquí y no en
                    // un bloque catch() para que no interceptemos errores
                    // de errores reales en los componentes.
                    error => {
                        console.log("Hubo un error");
                    }
                );
    }, [toSearch]);
    return (
        <div>
            <h1>Cusumiendo el context 2 : {toSearch}</h1>
            <div className="gallery-item"></div>
            {cursos.map(curso => (
                <div>
                    <h1>{curso.name}</h1>
                    <img
                        className="mason-img"
                        alt="Remy Sharp"
                        src={`data:image/jpeg;base64,${curso.image}`}
                    />
                </div>
            ))}
        </div>
    );
};

export default Cursos;
