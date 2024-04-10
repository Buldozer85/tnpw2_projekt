import {Link} from "@inertiajs/react";
import {ArrowLongLeftIcon, ArrowLongRightIcon} from "@heroicons/react/16/solid/index.js";

export default function Pagination({ pagination }) {


    const [previous, next] = [pagination[0], pagination.slice(-1)[0]];

    pagination = pagination.slice(1, pagination.length - 1)





 previous.label = 'Předchozí';
    next.label = 'Následující';

    return (
        <nav className="flex items-center justify-between border-t border-gray-200 px-4 sm:px-0 mt-12">
            <div className="-mt-px flex w-0 flex-1">
                {previous.url != null ?
                    <Link preserveScroll href={previous.url} className="inline-flex items-center border-t-2 border-transparent pr-1 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                        <ArrowLongLeftIcon className="mr-3 h-5 w-5 text-gray-400" aria-hidden="true" />
                        {previous.label}
                    </Link>
                    : null
                }
            </div>
            <div className="hidden md:-mt-px md:flex">
                {pagination.map((link) => link.url == null ? null : (
                    <Link preserveScroll className={"inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700" + ((link.active) ? " border-gray-900 text-gray-900" : '')} href={link.url} key={link.label}>{link.label}</Link>
                ))}
            </div>
            <div className="-mt-px flex w-0 flex-1 justify-end">
                {next.url != null ?
                    <Link preserveScroll href={next.url} className="inline-flex items-center border-t-2 border-transparent pr-1 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                        {next.label}
                        <ArrowLongRightIcon className="ml-3 h-5 w-5 text-gray-400" aria-hidden="true" />
                    </Link>
                    : null
                }
            </div>
        </nav>
    )
}