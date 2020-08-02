import React from "react";
import { makeStyles } from "@material-ui/core/styles";
import Card from "@material-ui/core/Card";
import CardActionArea from "@material-ui/core/CardActionArea";
import CardActions from "@material-ui/core/CardActions";
import CardContent from "@material-ui/core/CardContent";
import CardMedia from "@material-ui/core/CardMedia";
import Button from "@material-ui/core/Button";
import Typography from "@material-ui/core/Typography";

const useStyles = makeStyles({
    root: {
        maxWidth: 345
    },
    media: {
        height: 140
    }
});
let CursoCard = curso => {
    const { name, image, description } = curso.curso;
    let array = description.split("\n");
    let _sDesc = array[0];
    if (!_sDesc.length < 25) _sDesc = _sDesc.substr(0, 25) + "...";

    const classes = useStyles();

    return (
        <Card className={classes.root}>
            <CardActionArea>
                <CardMedia
                    className={classes.media}
                    image={`data:image/jpeg;base64,${image}`}
                    title="Contemplative Reptile"
                />

                <CardContent>
                    <Typography gutterBottom variant="h5" component="h2">
                        {name}
                    </Typography>
                    <Typography
                        variant="body2"
                        color="textSecondary"
                        component="p"
                    >
                        {_sDesc}
                    </Typography>
                </CardContent>
            </CardActionArea>
            <CardActions>
                <Button
                    href={"/Curso/" + curso.id}
                    size="small"
                    color="primary"
                >
                    Ver más
                </Button>
            </CardActions>
        </Card>
    );
};

export default CursoCard;
