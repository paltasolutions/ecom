import ListItem, { ListItemProps } from "./listItem";

interface ListProps {
    items: ListItemProps[]
}

function List({items}: ListProps) {
    return (
        <div className="mt-8">
            <div className="flow-root">
                <ul role="list" className="-my-6 divide-y divide-gray-200">
                    {items.map(item => <ListItem {...item} />)}
                </ul>
            </div>
        </div>
    )
}

export default List
