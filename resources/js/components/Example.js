import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import SearchComponent from "./Search/search.component";
import CursoComponent from "./Cursos/cursos.component";
import CursoProvider from "../providers/curso.provider";
const token = document.getElementById("api_token").content;
//buildpack deploy
function Example() {
    return (
        <div className="container">
            <CursoProvider>
                <SearchComponent />
                <CursoComponent />
            </CursoProvider>
        </div>
    );
}

export default Example;

if (document.getElementById("example")) {
    ReactDOM.render(<Example />, document.getElementById("example"));
}
