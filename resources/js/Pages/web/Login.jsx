
import {Head, router, usePage} from "@inertiajs/react";
import {useState} from "react";
import Input from "../../Components/Web/Input.jsx";

export default function Login() {
    const { errors } = usePage().props;

    const [values, setValues] = useState({
        email: '',
        password: '',
    })

    function handleChange(e) {
        const key = e.target.id;
        const value = e.target.value
        setValues(values => ({
            ...values,
            [key]: value,
        }))
    }
    function handleSubmit(e) {
        e.preventDefault()
        router.post('/login', values)
    }

    return (
        <main className="h-full">
            <Head title="Přihlášení"/>
                <div className="flex min-h-full flex-1">
                    <div className="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
                        <div className="mx-auto w-full max-w-sm lg:w-96">
                            <div>
                                <img
                                    className="h-10 w-auto"
                                    src="images/logo-no-background.png"
                                    alt="MovieBox"
                                />
                                <h2 className="mt-8 text-2xl font-bold leading-9 tracking-tight text-gray-900">
                                    Přihlašte se ke svému účtu
                                </h2>
                                { errors.loginError && <p className={"text-red-600 mt-4"}>{ errors.loginError }</p>}
                            </div>

                            <div className="mt-10">
                                <div>
                                    <form onSubmit={handleSubmit} method="POST" className="space-y-6">
                                            <Input
                                                id={"email"}
                                                name={"email"}
                                                type={"email"}
                                                autoComplete={"email"}
                                                required={true}
                                                label={"Email"}
                                                changeEvent={handleChange}
                                                error={errors.email}
                                                value={values.email}
                                            />

                                            <Input
                                                id={"password"}
                                                name={"password"}
                                                type={"password"}
                                                autoComplete={"password"}
                                                required={true}
                                                label={"Heslo"}
                                                changeEvent={handleChange}
                                                error={errors.password}
                                                value={values.password}
                                        />


                                        <div>
                                            <button
                                                type="submit"
                                                className="flex w-full justify-center rounded-md bg-gray-900 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600"
                                            >
                                                Přihlásit se
                                            </button>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div className="relative hidden w-0 flex-1 lg:block">
                        <img
                            className="absolute inset-0 h-full w-full object-cover"
                            src="images/b746c4d300be068ecf6a12aaf62b4a00.jpg"
                            alt=""
                        />
                    </div>
                </div>
        </main>
    )
}