export default function Input({ id, name, type = 'text', label = '', required = false, autoComplete = '', changeEvent = () => {}, error, value = '' }) {
    return (
        <div className={"flex-1"}>
            <label htmlFor={id} className="block text-sm font-medium leading-6 text-gray-900">
                {label}
            </label>

            <div className="mt-2">
                <input
                    id={id}
                    name={name}
                    type={type}
                    autoComplete={autoComplete}
                    required={required}
                    className="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6"
                    onChange={changeEvent}
                    value={value}
                />
            </div>
            {error && <p className={"text-red-600 text-xs mt-4"}>{error}</p>}
        </div>

    )
}