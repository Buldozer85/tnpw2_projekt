import {formattedDate} from "../../services/DateService.js";

export default function Review({review, loggedUser, evenHandle}) {
    return (
        <article
                 className="flex max-w-xl flex-col items-start justify-between">
            <div className="flex items-center gap-x-4 text-xs">
                <time dateTime={review.created_at} className="text-gray-500">
                    {formattedDate(review.created_at)}
                </time>

            </div>
            <div className="group relative">
                <p className="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{review.content}</p>
            </div>
            <div className={"flex flex-row justify-between mt-8 items-center w-full"}>
                <div className="relative flex items-center gap-x-4 w-full">
                    <div className={"flex items-center gap-x-4"}>
                        <div
                            className="h-10 w-10 rounded-full bg-gray-900 text-white flex items-center justify-center flex-1">
                            {review.user.first_name[0] + review.user.last_name[0]}
                        </div>
                        <div className="text-sm leading-6">
                            <p className="font-semibold text-gray-900">
                                <span className="absolute inset-0"/>
                                {review.user.first_name} {review.user.last_name}
                            </p>
                        </div>
                    </div>

                    <div>
                        <p>{review.rating} / 10</p>
                    </div>


                </div>

                {
                    (loggedUser) && (review.user_id === loggedUser.id) ?
                        <div>
                            <button onClick={evenHandle}
                                    className={"bg-red-600 text-white rounded-lg p-2"}>Smazat
                            </button>
                        </div>
                        :
                        null
                }
            </div>

        </article>
    )
}