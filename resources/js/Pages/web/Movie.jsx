
import ShowDetail from "../../Components/Web/ShowDetail.jsx";
import {usePage} from "@inertiajs/react";

export default function Movie({ movie, previousURL, loggedUser, reviews }) {
    const { errors } = usePage().props
    return (
        <ShowDetail show={movie.data}
                    previousURL={previousURL}
                    loggedUser={loggedUser}
                    reviews={reviews}
                    errors={errors}
        />
    )
}