import Layout from "../../Components/Web/Layout.jsx";
import Input from "../../Components/Web/Input.jsx";
import {useState} from "react";
import {router, usePage} from "@inertiajs/react";

export default function Profile({loggedUser}) {
    const { errors } = usePage().props;

    const [values, setValues] = useState({
        first_name: loggedUser.first_name,
        last_name: loggedUser.last_name,
        email: loggedUser.email,
        password: '',
        password_confirmation: ''

    });

     function handleChange(e) {
         const key = e.target.id;
         const value = e.target.value;
         setValues(values => ({
             ...values,
             [key]: value,
         }));
     }

    function handleSubmit(e) {
        e.preventDefault();
        router.post('/profil/update', values);
    }

    return(
        <Layout title={"Profil"} loggedUser={loggedUser}>
            <h1 className="text-4xl text-center text-gray-900 mt-12">Úpráva profilu</h1>
            <div className="space-y-10 divide-y divide-gray-900/10">
                <div className="grid grid-cols-1 gap-x-8 gap-y-8 pt-10 max-w-2xl mx-auto">
                    <form onSubmit={handleSubmit}  method="POST" className="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                        <div className="px-4 py-6 sm:p-8">
                            <div className="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div className="sm:col-span-3">
                                    <Input label="Jméno" name="first_name" id="first_name" placeholder="Pepa" required  value={values.first_name} changeEvent={handleChange} error={errors.first_name}/>
                                </div>

                                <div className="sm:col-span-3">
                                    <Input label="Příjmení" name="last_name" id="last_name" placeholder="Jandač" required  value={values.last_name} changeEvent={handleChange} error={errors.last_name}/>
                                </div>

                                <div className="sm:col-span-6 border-b-2 solid border-gray-300 pb-12">
                                    <Input label="E-mail" name="email" id="email" placeholder="pepa@seznam.cz" required value={values.email} changeEvent={handleChange} error={errors.email}/>
                                </div>

                                <h2 className="sm:col-span-6 font-bold">Změna hesla</h2>


                                <div className="sm:col-span-3">
                                    <Input label="Heslo" name="password" id="password"  type="password" changeEvent={handleChange} error={errors.password}/>
                                </div>

                                <div className="sm:col-span-3">
                                    <Input label="Heslo znovu" name="password_confirmation" id="password_confirmation"  type="password" changeEvent={handleChange} error={errors.password_confirmation}/>
                                </div>
                            </div>
                        </div>
                        <div className="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                            <button className={"bg-gray-900 text-white rounded-lg px-4 py-2"} type={"submit"}>Uložit</button>
                        </div>
                    </form>
                </div>
            </div>
        </Layout>
    );
}
