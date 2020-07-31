import React from "react";
// imports
import TextField from "@material-ui/core/TextField";
import IconButton from "@material-ui/core/IconButton";
import InputAdornment from "@material-ui/core/InputAdornment";
import SearchIcon from "@material-ui/icons/Search";

const SearchComponent = () => {
    let onChange = event => {
        console.log(event.target.value);
    };
    return (
        <div>
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
