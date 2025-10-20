<?php
// Properties data - this would normally come from your backend API/database
function getProperties() {
    return [
        [
            'id' => 1,
            'title' => '1963 S Crescent Heights Blvd',
            'location' => 'Hills, CA 90210',
            'image' => 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'status' => 'For Sale',
            'price' => '$2,850,000',
            'bedrooms' => 4,
            'bathrooms' => 3,
            'area' => '2,500 sqft'
        ],
        [
            'id' => 2,
            'title' => '2847 Sunset Boulevard',
            'location' => 'Hollywood, CA 90026',
            'image' => 'https://images.unsplash.com/photo-1570129477492-45c003edd2be?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'status' => 'For Sale',
            'price' => '$1,950,000',
            'bedrooms' => 3,
            'bathrooms' => 2,
            'area' => '1,800 sqft'
        ],
        [
            'id' => 3,
            'title' => '9156 Maple Drive',
            'location' => 'Beverly Hills, CA 90210',
            'image' => 'https://images.unsplash.com/photo-1568605114967-8130f3a36994?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'status' => 'For Sale',
            'price' => '$4,200,000',
            'bedrooms' => 5,
            'bathrooms' => 4,
            'area' => '3,200 sqft'
        ],
        [
            'id' => 4,
            'title' => '4729 Wilshire Boulevard',
            'location' => 'Mid-City, CA 90010',
            'image' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'status' => 'For Sale',
            'price' => '$1,250,000',
            'bedrooms' => 3,
            'bathrooms' => 2,
            'area' => '1,600 sqft'
        ],
        [
            'id' => 5,
            'title' => '1500 Ocean Avenue',
            'location' => 'Santa Monica, CA 90401',
            'image' => 'https://images.unsplash.com/photo-1449824913935-59a10b8d2000?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'status' => 'For Sale',
            'price' => '$3,750,000',
            'bedrooms' => 4,
            'bathrooms' => 3,
            'area' => '2,800 sqft'
        ],
        [
            'id' => 6,
            'title' => '8234 Melrose Avenue',
            'location' => 'West Hollywood, CA 90069',
            'image' => 'https://images.unsplash.com/photo-1600047509807-ba8f99d2cdde?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'status' => 'For Sale',
            'price' => '$2,100,000',
            'bedrooms' => 3,
            'bathrooms' => 3,
            'area' => '2,000 sqft'
        ],
        [
            'id' => 7,
            'title' => '456 Rodeo Drive',
            'location' => 'Beverly Hills, CA 90210',
            'image' => 'https://images.unsplash.com/photo-1605146769289-440113cc3d00?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'status' => 'For Sale',
            'price' => '$8,500,000',
            'bedrooms' => 6,
            'bathrooms' => 5,
            'area' => '4,500 sqft'
        ],
        [
            'id' => 8,
            'title' => '123 Pacific Coast Highway',
            'location' => 'Malibu, CA 90265',
            'image' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'status' => 'For Sale',
            'price' => '$12,000,000',
            'bedrooms' => 5,
            'bathrooms' => 4,
            'area' => '3,800 sqft'
        ],
        [
            'id' => 9,
            'title' => '789 Sunset Strip',
            'location' => 'West Hollywood, CA 90069',
            'image' => 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'status' => 'For Rent',
            'price' => '$4,500/month',
            'bedrooms' => 2,
            'bathrooms' => 2,
            'area' => '1,200 sqft'
        ],
        [
            'id' => 10,
            'title' => '321 Venice Beach Blvd',
            'location' => 'Venice, CA 90291',
            'image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'status' => 'For Sale',
            'price' => '$1,800,000',
            'bedrooms' => 3,
            'bathrooms' => 2,
            'area' => '1,650 sqft'
        ],
        [
            'id' => 11,
            'title' => '555 Manhattan Beach Ave',
            'location' => 'Manhattan Beach, CA 90266',
            'image' => 'https://images.unsplash.com/photo-1583608205776-bfd35f0d9f83?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'status' => 'For Rent',
            'price' => '$6,200/month',
            'bedrooms' => 4,
            'bathrooms' => 3,
            'area' => '2,400 sqft'
        ],
        [
            'id' => 12,
            'title' => '777 Bel Air Road',
            'location' => 'Bel Air, CA 90077',
            'image' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'status' => 'For Sale',
            'price' => '$15,500,000',
            'bedrooms' => 7,
            'bathrooms' => 6,
            'area' => '6,200 sqft'
        ],
        [
            'id' => 13,
            'title' => '888 Mulholland Drive',
            'location' => 'Hollywood Hills, CA 90210',
            'image' => 'https://images.unsplash.com/photo-1571055107559-3e67626fa8be?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'status' => 'Sold',
            'price' => '$3,200,000',
            'bedrooms' => 4,
            'bathrooms' => 3,
            'area' => '2,800 sqft'
        ],
        [
            'id' => 14,
            'title' => '234 Laurel Canyon Blvd',
            'location' => 'Studio City, CA 91604',
            'image' => 'https://images.unsplash.com/photo-1572120360610-d971b9d7767c?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'status' => 'For Rent',
            'price' => '$3,800/month',
            'bedrooms' => 3,
            'bathrooms' => 2,
            'area' => '1,800 sqft'
        ],
        [
            'id' => 15,
            'title' => '666 Doheny Drive',
            'location' => 'West Hollywood, CA 90069',
            'image' => 'https://images.unsplash.com/photo-1598300042247-d088f8ab3a91?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'status' => 'For Sale',
            'price' => '$2,750,000',
            'bedrooms' => 3,
            'bathrooms' => 3,
            'area' => '2,100 sqft'
        ],
        [
            'id' => 16,
            'title' => '999 Coldwater Canyon',
            'location' => 'Beverly Hills, CA 90210',
            'image' => 'https://images.unsplash.com/photo-1576941089067-2de3c901e126?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'status' => 'For Sale',
            'price' => '$5,900,000',
            'bedrooms' => 5,
            'bathrooms' => 4,
            'area' => '3,600 sqft'
        ],
        [
            'id' => 17,
            'title' => '111 El Camino Drive',
            'location' => 'Beverly Hills, CA 90212',
            'image' => 'https://images.unsplash.com/photo-1493809842364-78817add7ffb?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'status' => 'For Rent',
            'price' => '$7,500/month',
            'bedrooms' => 4,
            'bathrooms' => 4,
            'area' => '3,000 sqft'
        ],
        [
            'id' => 18,
            'title' => '345 Robertson Blvd',
            'location' => 'West Hollywood, CA 90048',
            'image' => 'https://images.unsplash.com/photo-1505843513577-22bb7d21e455?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'status' => 'For Sale',
            'price' => '$1,950,000',
            'bedrooms' => 2,
            'bathrooms' => 2,
            'area' => '1,400 sqft'
        ],
        [
            'id' => 19,
            'title' => '567 Fountain Avenue',
            'location' => 'West Hollywood, CA 90069',
            'image' => 'https://images.unsplash.com/photo-1494526585095-c41746248156?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'status' => 'For Rent',
            'price' => '$5,200/month',
            'bedrooms' => 3,
            'bathrooms' => 2,
            'area' => '1,900 sqft'
        ],
        [
            'id' => 20,
            'title' => '890 San Vicente Blvd',
            'location' => 'Santa Monica, CA 90402',
            'image' => 'https://images.unsplash.com/photo-1462826303086-329426d1aef5?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'status' => 'Sold',
            'price' => '$4,100,000',
            'bedrooms' => 4,
            'bathrooms' => 3,
            'area' => '2,700 sqft'
        ],
        [
            'id' => 21,
            'title' => '432 Montana Avenue',
            'location' => 'Santa Monica, CA 90403',
            'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'status' => 'For Sale',
            'price' => '$3,450,000',
            'bedrooms' => 3,
            'bathrooms' => 3,
            'area' => '2,200 sqft'
        ]
    ];
}

// Pagination helper function
function paginateProperties($properties, $page = 1, $perPage = 6) {
    $total = count($properties);
    $totalPages = ceil($total / $perPage);
    $offset = ($page - 1) * $perPage;
    
    $paginatedProperties = array_slice($properties, $offset, $perPage);
    
    return [
        'properties' => $paginatedProperties,
        'pagination' => [
            'current_page' => $page,
            'total_pages' => $totalPages,
            'per_page' => $perPage,
            'total_properties' => $total,
            'has_next' => $page < $totalPages,
            'has_prev' => $page > 1
        ]
    ];
}

// Get status badge color
function getStatusBadgeColor($status) {
    switch(strtolower($status)) {
        case 'for sale':
            return 'bg-[#151EA6]';
        case 'for rent':
            return 'bg-green-600';
        case 'sold':
            return 'bg-red-600';
        default:
            return 'bg-gray-600';
    }
}
?>