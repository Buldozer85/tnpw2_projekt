import {Head, router, usePage} from "@inertiajs/react";
import {useState} from "react";
import Input from "../../Components/Web/Input.jsx";

export default function Register() {
    const { errors } = usePage().props;

    const [values, setValues] = useState({
        email: '',
        first_name: '',
        last_name: '',
        password: '',
        password_confirmation: ''
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
        router.post('/register', values)
    }

    return (
        <main className="h-full">
            <Head title="Registrace"/>
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
                                Vytvořte si účet
                            </h2>
                        </div>

                        <div className="mt-10">
                            <div>
                                <form onSubmit={handleSubmit} method="POST" className="space-y-6">
                                    <div className="flex flex-row w-full justify-between gap-x-4 items-baseline">
                                       <Input id={'first_name'} name={'first_name'} required label={'Jméno'} changeEvent={handleChange} error={errors.first_name} value={values.first_name}/>
                                        <Input id={'last_name'} name={'last_name'} required label={'Příjmení'} changeEvent={handleChange} error={errors.last_name} value={values.last_name}/>
                                    </div>
                                    <div>
                                        <Input id={'email'} name={'email'} required label={'Email'} autoComplete={'email'} changeEvent={handleChange} type={'email'} error={errors.email} value={values.email}/>
                                    </div>

                                    <div className="flex flex-row w-full justify-between items-baseline gap-x-4">
                                        <Input id={'password'} name={'password'} required label={'Heslo'} changeEvent={handleChange} type={'password'} autoComplete={'new-password'} error={errors.password} value={values.password}/>
                                        <Input id={'password_confirmation'} name={'password_confirmation'} required label={'Heslo znovu'} changeEvent={handleChange} type={'password'} error={errors.password_confirmation} value={values.password_confirmation}></Input>
                                    </div>

                                    <div>
                                        <button
                                            type="submit"
                                            className="flex w-full justify-center rounded-md bg-gray-900 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600"
                                        >
                                            Zaregistrovat se
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