import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import SearchComponent from "./Search/search.component";
import CursoComponent from "./Cursos/cursos.component";
import CursoProvider from "../providers/curso.provider";
import Grid from "@material-ui/core/Grid";

//buildpack deploy
function Example() {
    return (
        <div className="container">
            <Grid container spacing={2}>
                <CursoProvider>
                    <Grid item xs={12} md={3}>
                        <SearchComponent />
                    </Grid>
                    <Grid item xs={12} md={9}>
                        <CursoComponent />
                    </Grid>
                </CursoProvider>
            </Grid>
        </div>
    );
}

export default Example;

if (document.getElementById("example")) {
    ReactDOM.render(<Example />, document.getElementById("example"));
}
