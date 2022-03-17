import Button from "../atom/button";
import CartItemImage from "../atom/cartItemImage";
import { CartItem } from "../generated";
import number_format from "../number_format";

function ListItem({
    name,
    line_total,
    image,
    quantity
}: CartItem) {
    const formattedAmount =
        number_format(
            line_total.amount! / 100,
            line_total.currency.decimals!,
            line_total.currency.decimal_separator!,
            line_total.currency.thousands_separator!
        )

    return (
        <li className="flex py-6">
            <div className="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                <CartItemImage {...image} />
            </div>

            <div className="ml-4 flex flex-1 flex-col">
                <div>
                    <div className="flex justify-between text-base font-medium text-gray-900">
                        <h3>
                            <a href="#">{name}</a>
                        </h3>
                        <p className="ml-4">{line_total.currency.symbol}{formattedAmount}</p>
                    </div>
                </div>
                <div className="flex flex-1 items-end justify-between text-sm">
                    <p className="text-gray-500">Qty {quantity}</p>
                    <div className="flex">
                        <Button>Remove</Button>
                    </div>
                </div>
            </div>
        </li>
    )
}

export default ListItem
