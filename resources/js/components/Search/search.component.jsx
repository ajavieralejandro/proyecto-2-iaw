import React, { useContext } from "react";
// imports
import TextField from "@material-ui/core/TextField";
import IconButton from "@material-ui/core/IconButton";
import InputAdornment from "@material-ui/core/InputAdornment";
import SearchIcon from "@material-ui/icons/Search";
import { CursoContext } from "../../providers/curso.provider";
import { makeStyles } from "@material-ui/core/styles";
const useStyles = makeStyles(theme => ({
    center: {
        margin: "0 auto"
    }
}));

const SearchComponent = () => {
    const classes = useStyles();

    const { toFetch } = useContext(CursoContext);

    let onChange = event => {
        toFetch(event.target.value);
    };
    return (
        <div className={classes.center}>
            <TextField
                onChange={onChange}
                label="Curso"
                InputProps={{
                    endAdornment: (
                        <InputAdornment>
                            <IconButton>
                                <SearchIcon />
                            </IconButton>
                        </InputAdornment>
                    )
                }}
            />
        </div>
    );
};

export default SearchComponent;
