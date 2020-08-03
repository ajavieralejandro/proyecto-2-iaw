import React, { useState, useEffect, useContext } from "react";
import { CursoContext } from "../../providers/curso.provider";

import CursoCard from "../CursoCard/cursocard.component";
import Grid from "@material-ui/core/Grid";
import CircularProgress from "@material-ui/core/CircularProgress";

const token = document.getElementById("api_token").content;

let Cursos = () => {
    const {
        toSearch,
        cursos,
        cursosFetched,
        fetchLoading,
        loading
    } = useContext(CursoContext);
    useEffect(() => {
        fetchLoading(true);
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
                    //console.log("Estoy trayendo : ", result);
                    cursosFetched(result);
                    fetchLoading(false);
                },
                // Nota: es importante manejar errores aquí y no en
                // un bloque catch() para que no interceptemos errores
                // de errores reales en los componentes.
                error => {
                    console.log("Error : ");
                    console.log(error);
                    fetchLoading(false);
                }
            );
    }, [toSearch]);
    return (
        <div>
            {loading ? (
                <Grid
                    container
                    direction="row"
                    justify="center"
                    alignItems="center"
                >
                    <CircularProgress />
                </Grid>
            ) : (
                <Grid container spacing={2}>
                    {cursos.map(curso => (
                        <Grid key={curso.id} item xs={12} md={3}>
                            <CursoCard key={curso.id} curso={curso} />
                        </Grid>
                    ))}
                </Grid>
            )}
        </div>
    );
};

export default Cursos;
