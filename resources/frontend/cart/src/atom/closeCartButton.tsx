function CloseCartButton(props: React.HTMLAttributes<HTMLButtonElement>) {
    return (
        <button
            type="button"
            className="-m-2 p-2 text-gray-400 hover:text-gray-500"
            {...props}
        >
            <span className="sr-only">Close panel</span>
            {/* <!-- Heroicon name: outline/x --> */}
            <svg className="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    )
}

export default CloseCartButton
