export default function TextArea({name, id, placeholder, error, value = '', changeEvent = null, buttonValue = 'Přidat'}) {

    return (

               <div>
                    <div className="overflow-hidden rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-gray-600">
                        <label htmlFor="comment" className="sr-only">
                            {placeholder}
                        </label>
                        {error && <p className={"text-red-600"}>{error}</p>}
                        <textarea
                            rows={3}
                            name={name}
                            id={id}
                            className="block w-full resize-none border-0 bg-transparent py-1.5 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                            placeholder={placeholder}
                            defaultValue={value}
                            onChange={changeEvent}
                        />


                        <div className="py-2" aria-hidden="true">
                            <div className="py-px">
                                <div className="h-9" />
                            </div>
                        </div>
                    </div>

                    <div className="absolute inset-x-0 bottom-0 flex justify-end py-2 pl-3 pr-2">

                        <div className="flex-shrink-0">
                            <button
                                type="submit"
                                className="inline-flex items-center rounded-md bg-gray-900 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600"
                            >
                                {buttonValue}
                            </button>
                        </div>
                    </div>
               </div>
    )
}
