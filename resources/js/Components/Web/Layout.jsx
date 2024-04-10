import {Head, Link} from '@inertiajs/react'
import {Bars3Icon, XMarkIcon} from "@heroicons/react/24/outline/index.js";
import {Dialog} from "@headlessui/react";
import {useState} from "react";
import PopOverMenu from "./PopOverMenu.jsx";


const navigation = [
    {name: 'Domů', href: '/'},
    {name: 'Filmy', href: '/filmy'},
    {name: 'Seriály', href: '/serialy'},
    {name: 'Žebříčky', href: '/zebricky'},
]

const today = new Date().getFullYear()


export default function Layout({children, title, loggedUser}) {
    const [mobileMenuOpen, setMobileMenuOpen] = useState(false)
    return (
        <main>
            <Head title={title}></Head>
            <header className=" inset-x-0 top-0 z-50">
                <nav className="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
                    <div className="flex lg:flex-1">
                        <Link href={"/"}>
                            <span className="sr-only">MovieBox</span>
                            <img
                                className="h-8 w-auto"
                                src="/images/logo-no-background.png"
                                alt=""
                            />
                        </Link>
                    </div>
                    <div className="flex lg:hidden">
                        <button
                            type="button"
                            className="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700"
                            onClick={() => setMobileMenuOpen(true)}
                        >
                            <span className="sr-only">Open main menu</span>
                            <Bars3Icon className="h-6 w-6" aria-hidden="true"/>
                        </button>
                    </div>
                    <div className="hidden lg:flex lg:gap-x-12">
                        {navigation.map((item) => (
                            <Link key={item.name} href={item.href}> {item.name}</Link>
                        ))}
                    </div>
                    <div className="hidden lg:flex lg:flex-1 lg:justify-end">
                        {
                            !loggedUser ?
                                <div className={"space-x-4"}>
                                    <Link href={"/prihlaseni"}>
                                        Přihlásit se <span aria-hidden="true">&rarr;</span>
                                    </Link>

                                    <Link href={"/registrace"}>
                                        Registrovat <span aria-hidden="true">&rarr;</span>
                                    </Link>
                                </div>

                                :
                                <PopOverMenu loggedUser={loggedUser}></PopOverMenu>
                        }

                    </div>
                </nav>
                <Dialog as="div" className="lg:hidden" open={mobileMenuOpen} onClose={setMobileMenuOpen}>
                    <div className="fixed inset-0 z-50"/>
                    <Dialog.Panel
                        className="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                        <div className="flex items-center justify-between">
                            <Link href="/" className="-m-1.5 p-1.5">
                                <span className="sr-only">MovieBox</span>
                                <img
                                    className="h-8 w-auto"
                                    src="/images/logo-no-background.png"
                                    alt=""
                                />
                            </Link>
                            <button
                                type="button"
                                className="-m-2.5 rounded-md p-2.5 text-gray-700"
                                onClick={() => setMobileMenuOpen(false)}
                            >
                                <span className="sr-only">Zavřít menu</span>
                                <XMarkIcon className="h-6 w-6" aria-hidden="true"/>
                            </button>
                        </div>
                        <div className="mt-6 flow-root">
                            <div className="-my-6 divide-y divide-gray-500/10">
                                <div className="space-y-2 py-6">
                                    {navigation.map((item) => (
                                        <Link
                                            key={item.name}
                                            href={item.href}
                                            className="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50"
                                        >
                                            {item.name}
                                        </Link>
                                    ))}
                                </div>
                                <div className="py-6">
                                    {!loggedUser &&
                                        <div>
                                        <Link
                                            href={"/prihlaseni"}
                                            className="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50"
                                        >
                                            Přihlásit se
                                        </Link>

                                        <Link
                                            href={"/registrace"}
                                            className="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50"
                                        >
                                            Registrovat se
                                        </Link>
                                    </div>}

                                    {loggedUser && <div>
                                        <Link
                                            href={"/profil"}
                                            className="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50"
                                        >
                                            Profil
                                        </Link>

                                        <Link
                                            href={"/odhlasit"}
                                            className="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50"
                                        >
                                            Odhlásit se
                                        </Link>
                                    </div>}

                                </div>
                            </div>
                        </div>
                    </Dialog.Panel>
                </Dialog>
            </header>
            <article className={"min-h-screen"}>{children}</article>


            {/* Footer */}
            <footer className="mx-auto mt-40 max-w-7xl overflow-hidden px-6 pb-20 sm:mt-64 sm:pb-24 lg:px-8">
                <nav className="-mb-6 columns-2 sm:flex sm:justify-center sm:space-x-12" aria-label="Footer">
                    {navigation.map((item) => (
                        <div key={item.name} className="pb-6">
                            <Link href={item.href} className="text-sm leading-6 text-gray-600 hover:text-gray-900">
                                {item.name}
                            </Link>
                        </div>
                    ))}
                </nav>
                <p className="mt-10 text-center text-xs leading-5 text-gray-500">
                    &copy; {today} Jedná se o školní projekt v rámci předmětu tnpw2
                </p>
            </footer>
        </main>
    )
}
