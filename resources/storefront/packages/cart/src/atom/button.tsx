function Button({children, ...props}: React.HTMLAttributes<HTMLButtonElement>) {
    return (
        <button
            type="button"
            className="text-sm font-medium text-indigo-600 hover:text-indigo-500"
            {...props}
        >
            {children}
        </button>
    )
}

export default Button
