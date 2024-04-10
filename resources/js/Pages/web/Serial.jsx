
import ShowDetail from "../../Components/Web/ShowDetail.jsx";
import {usePage} from "@inertiajs/react";

export default function Serial({ serial, previousURL, loggedUser, reviews }) {
    const { errors } = usePage().props
    console.log(serial.data)
    return (
        <ShowDetail show={serial.data}
                    previousURL={previousURL}
                    loggedUser={loggedUser}
                    reviews={reviews}
                    errors={errors}>
            <dl className="mt-10 grid grid-cols-2 gap-8 border-t border-gray-900/10 pt-10 sm:grid-cols-4">
                    <div>
                        <dt className="text-sm font-semibold leading-6 text-gray-600">Počet sérií</dt>
                        <dd className="mt-2 text-3xl font-bold leading-10 tracking-tight text-gray-900">{serial.data.count_of_seasons}</dd>
                    </div>

                <div>
                    <dt className="text-sm font-semibold leading-6 text-gray-600">Počet epizod</dt>
                    <dd className="mt-2 text-3xl font-bold leading-10 tracking-tight text-gray-900">{serial.data.count_of_episodes}</dd>
                </div>

                <div>
                    <dt className="text-sm font-semibold leading-6 text-gray-600">Ukončený</dt>
                    <dd className="mt-2 text-3xl font-bold leading-10 tracking-tight text-gray-900">{serial.data.still_running ? 'Ne' : 'Ano'}</dd>
                </div>

            </dl>

        </ShowDetail>
    )
}