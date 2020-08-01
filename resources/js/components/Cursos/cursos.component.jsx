import React, { useState, useEffect } from "react";
import CursoContext from "../../providers/curso.provider";
let Cursos = () => {
    return (
        <CursoContext.Consumer>
            {cursos => (
                <div>
                    <h1>Cusumiendo el context : {cursos.toSearch()}</h1>
                </div>
            )}
        </CursoContext.Consumer>
    );
};

export default Cursos;
