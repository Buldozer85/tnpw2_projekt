import {Link, router} from "@inertiajs/react";
import DOMPurify from "isomorphic-dompurify";
import Layout from "./Layout.jsx";
import {ArrowLeftIcon} from "@heroicons/react/24/outline/index.js";
import TextArea from "./TextArea.jsx";
import {useState} from "react";
import {formattedDate} from "../../services/DateService.js";
import Pagination from "./Pagination.jsx";
import Review from "./Review.jsx";

export default function ShowDetail({show, previousURL, reviews, loggedUser, errors, children = ''}) {

    let loggedUserReview = [];

    if (loggedUser) {
         loggedUserReview = loggedUser.reviews.filter((userReview) => {
            return show.id === userReview.show_id;
        })


    }

    const [values, setValues] = useState({
        'review': loggedUserReview.length >= 1 ? loggedUserReview[0].content : '',
        'rating': loggedUserReview.length >= 1 ? loggedUserReview[0].rating : ''
    })

    function handleSubmit(e) {
        e.preventDefault()

        if (loggedUserReview.length >= 1) {
            router.post(`/recenze/${loggedUserReview[0].id}/upravit`, values)
        } else {
            router.post(`/${show.id}/recenze/pridat`, values)
        }

    }

    function handleChange(e) {
        const key = e.target.id;
        const value = e.target.value
        setValues(values => ({
            ...values,
            [key]: value,
        }))
    }

    function handleDelete(e) {
        setValues({
            review: '',
            rating: ''
        })

        router.post(`/recenze/${loggedUserReview[0].id}/delete`);
    }

    const clean = DOMPurify.sanitize(show.description);

    const stats = [
        {label: 'Hodnocení', value: show.rating},
        {label: 'Počet recenzí', value: show.reviews_number},
        {label: 'Datum premiéry', value: show.date_of_premiere},
        {label: 'Délka', value: show.length ?? '-' + ' min.'}

    ]

    return (
        <Layout title={show.name} loggedUser={loggedUser}>
            <div className="bg-white py-24 sm:py-32">
                <div className="mx-auto max-w-7xl px-6 lg:px-8">
                    <Link
                        className={"space-x-2 justify-center items-center flex flex-row rounded-md bg-gray-900 w-24 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600"}
                        href={previousURL}>
                        <ArrowLeftIcon className="h-4 w-4" aria-hidden="true"/>
                        <span>Přehled</span>
                    </Link>
                    <div
                        className="mx-auto grid max-w-2xl grid-cols-1 items-start gap-x-8 gap-y-16 sm:gap-y-24 lg:mx-0 lg:max-w-none lg:grid-cols-2 min-h-[650px] mt-16 ">
                        <div className="lg:pr-4 h-full min-h-fit h-[550px] md:h-full">
                            <div
                                className="relative overflow-hidden rounded-3xl bg-gray-900 px-6 pb-9 pt-64 shadow-2xl sm:px-12 lg:max-w-lg lg:px-8 lg:pb-8 xl:px-10 xl:pb-10 h-full">
                                <img
                                    className="absolute inset-0 h-full w-full object-fit brightness-125"
                                    src={"/storage/shows/" + show.icon}
                                    alt=""
                                />

                            </div>
                        </div>
                        <div>
                            <div className="text-base leading-7 text-gray-700 lg:max-w-lg">
                                <h1 className="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                                    {show.name}
                                </h1>
                                <div className="max-w-xl">
                                    <p dangerouslySetInnerHTML={{__html: clean}} className="mt-6">
                                    </p>

                                </div>
                            </div>
                            <dl className="mt-10 grid grid-cols-2 gap-8 border-t border-gray-900/10 pt-10 sm:grid-cols-4">
                                {stats.map((stat, statIdx) => (
                                    <div key={statIdx}>
                                        <dt className="text-sm font-semibold leading-6 text-gray-600">{stat.label}</dt>
                                        <dd className="mt-2 text-3xl font-bold leading-10 tracking-tight text-gray-900">{stat.value}</dd>
                                    </div>
                                ))}
                            </dl>

                            {loggedUser ?
                                <div className="flex items-start space-x-4 mt-12">
                                    <div className="min-w-0 flex-1">
                                        <form onSubmit={handleSubmit} className="relative space-y-4">
                                            <div className={"w-32"}>
                                                <label htmlFor="company-website"
                                                       className="block text-sm font-medium leading-6 text-gray-900">
                                                    Hodnocení
                                                </label>
                                                {errors.rating && <p className={"text-red-600"}>{errors.rating}</p>}
                                                <div className="mt-2 flex rounded-md shadow-sm">
                                                    <input
                                                        type="text"
                                                        name="rating"
                                                        id="rating"
                                                        className="block w-full min-w-0 flex-1 rounded-none rounded-l-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6"
                                                        onChange={handleChange}
                                                        value={values.rating}
                                                    />
                                                    <span
                                                        className="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 px-3 text-gray-500 sm:text-sm">/ 10</span>
                                                </div>
                                            </div>
                                            <TextArea changeEvent={handleChange}
                                                      name={'review'}
                                                      id={'review'}
                                                      placeholder={'Napište recenzi...'}
                                                      value={values.review}
                                                      error={errors.review}
                                                      buttonValue={loggedUserReview.length >= 1 ? 'Upravit' : 'Přidat'}></TextArea>
                                        </form>
                                    </div>
                                </div>
                                : null
                            }

                        </div>



                    </div>
                    <div>{ children }</div>
                </div>
            </div>

            {reviews.data.length > 0 ?
                <div className="bg-white py-24 sm:py-32">
                    <div className="mx-auto max-w-7xl px-6 lg:px-8">
                        <div className="mx-auto max-w-2xl">
                            <h2 className="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Recenze</h2>

                            <div className="mt-10 space-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16">
                                {reviews.data.map((review) => (
                                    <Review key={review.id} review={review} loggedUser={loggedUser} evenHandle={handleDelete}/>
                                ))}
                            </div>
                            <Pagination pagination={reviews.links}/>
                        </div>
                    </div>
                </div>
                : null
            }
        </Layout>
    )
}