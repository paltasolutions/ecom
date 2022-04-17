function CartItemImage(props: React.ImgHTMLAttributes<HTMLImageElement> ) {
    return (
        <img
            className="h-full w-full object-cover object-center"
            {...props}
        />
    )
}

export default CartItemImage
