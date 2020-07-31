import React, { createContext, useState, useEffect } from "react";

export const CursoContext = createContext({
    cursos: [],
    toSearch: ""
});

const CursoProvider = ({ children }) => {
    const [toSearch, setToSearch] = useState("");
    const [cursos, setCursos] = useState([]);

    useEffect(() => {
        setCartItemsCount(getCartItemsCount(cartItems));
        setTotal(selectTotal(cartItems));
    }, [cartItems]);

    return (
        <CursoContext.Provider
            value={{
                cursos,
                toSearch
            }}
        >
            {children}
        </CursoContext.Provider>
    );
};

export default CursoProvider;
