import { GraphQLClient } from 'graphql-request'

const graphqlRequestClient = new GraphQLClient('http://localhost:8000/graphql')

export default graphqlRequestClient
