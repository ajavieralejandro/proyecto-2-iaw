import React, { createContext, useState, useEffect } from "react";

export const CursoContext = createContext({
    cursos: [],
    toSearch: "",
    cursosFetched: () => {},
    toFetch: () => {}
});

const CursoProvider = ({ children }) => {
    const [toSearch, setToSearch] = useState("Seteo la cadena");
    const [cursos, setCursos] = useState([]);

    const toFetch = toSearch => setToSearch(toSearch);
    const cursosFetched = cursos => setCursos(cursos);

    useEffect(() => {
        //setCartItemsCount(getCartItemsCount(cartItems));
        //setTotal(selectTotal(cartItems));
    }, []);

    return (
        <CursoContext.Provider
            value={{
                toFetch,
                toSearch,
                cursosFetched,
                cursos
            }}
        >
            {children}
        </CursoContext.Provider>
    );
};

export default CursoProvider;
