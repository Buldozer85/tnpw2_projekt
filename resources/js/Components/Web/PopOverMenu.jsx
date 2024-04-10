import {Popover, Transition} from "@headlessui/react";
import {ChevronDownIcon} from "@heroicons/react/24/outline/index.js";
import { Fragment } from 'react'
import {Link} from "@inertiajs/react";

export default function PopOverMenu({loggedUser}) {
    return (
        <Popover className="relative focus-gray-900 outline-none">
            <Popover.Button className="inline-flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900 focus-visible:outline-none">
                <span>{loggedUser.first_name + " " + loggedUser.last_name}</span>
                <ChevronDownIcon className="h-5 w-5" aria-hidden="true" />
            </Popover.Button>

            <Transition
                as={Fragment}
                enter="transition ease-out duration-200"
                enterFrom="opacity-0 translate-y-1"
                enterTo="opacity-100 translate-y-0"
                leave="transition ease-in duration-150"
                leaveFrom="opacity-100 translate-y-0"
                leaveTo="opacity-0 translate-y-1"
            >
                <Popover.Panel
                    className="absolute left-1/2 z-10 mt-5 flex w-screen max-w-min -translate-x-1/2 px-4">
                    <div
                        className="w-56 shrink rounded-xl bg-white p-4 text-sm font-semibold leading-6 text-gray-900 shadow-lg ring-1 ring-gray-900/5 flex flex-col text-center">
                        <Link href={'/profil'}>Profil</Link>
                        <Link href={'/odhlasit'}>Odhlásit se</Link>
                    </div>
                </Popover.Panel>
            </Transition>
        </Popover>
    )
}