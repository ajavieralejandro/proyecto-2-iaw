import React, { createContext, useState, useEffect } from "react";

export const CursoContext = createContext({
    loading: true,
    error: false,
    setError: () => {},
    cursos: [],
    toSearch: "",
    cursosFetched: () => {},
    toFetch: () => {},
    fetchLoading: () => {}
});

const CursoProvider = ({ children }) => {
    const [toSearch, setToSearch] = useState("");
    const [loading, setLoading] = useState(true);
    const [cursos, setCursos] = useState([]);
    const [error, setStateError] = useState(false);

    const setError = error => setStateError(error);
    const toFetch = toSearch => setToSearch(toSearch);
    const cursosFetched = cursos => setCursos(cursos);
    const fetchLoading = load => setLoading(load);

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
                cursos,
                loading,
                fetchLoading,
                error,
                setError
            }}
        >
            {children}
        </CursoContext.Provider>
    );
};

export default CursoProvider;
