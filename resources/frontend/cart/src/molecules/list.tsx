import { CartItem } from "../generated";
import ListItem from "./listItem";

interface ListProps {
    items: CartItem[]
}

function List({items}: ListProps) {
    return (
        <div className="mt-8">
            <div className="flow-root">
                <ul role="list" className="-my-6 divide-y divide-gray-200">
                    {items.map((item, key) => <ListItem {...item} key={`cartItem-${key}`} />)}
                </ul>
            </div>
        </div>
    )
}

export default List
