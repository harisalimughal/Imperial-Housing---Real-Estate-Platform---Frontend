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
        ],
        [
            'id' => 22,
            'title' => '123 Downtown Loft',
            'location' => 'Downtown, CA 90013',
            'image' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'status' => 'For Rent',
            'price' => '$2,800/month',
            'bedrooms' => 1,
            'bathrooms' => 1,
            'area' => '900 sqft'
        ],
        [
            'id' => 23,
            'title' => '456 Suburban House',
            'location' => 'Suburbs, CA 90210',
            'image' => 'https://images.unsplash.com/photo-1568605114967-8130f3a36994?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'status' => 'For Sale',
            'price' => '$1,200,000',
            'bedrooms' => 4,
            'bathrooms' => 3,
            'area' => '2,800 sqft'
        ],
        [
            'id' => 24,
            'title' => '789 Waterfront Villa',
            'location' => 'Waterfront, CA 90265',
            'image' => 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'status' => 'For Sale',
            'price' => '$8,500,000',
            'bedrooms' => 6,
            'bathrooms' => 5,
            'area' => '4,200 sqft'
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

// Filter properties based on criteria
function filterProperties($properties, $filters) {
    return array_filter($properties, function($property) use ($filters) {
        // Location filter - match cities and areas
        if (!empty($filters['location']) && !in_array($filters['location'], ['New York, US', 'Select your location'])) {
            $locationMatch = false;
            $propertyLocation = strtolower($property['location']);
            $filterLocation = strtolower($filters['location']);
            
            // Map filter locations to property location patterns
            $locationMap = [
                'los angeles, ca' => ['los angeles', 'hollywood', 'west hollywood', 'downtown'],
                'beverly hills, ca' => ['beverly hills', 'hills'],
                'santa monica, ca' => ['santa monica', 'venice'],
                'hollywood, ca' => ['hollywood', 'west hollywood'],
                'west hollywood, ca' => ['west hollywood', 'hollywood'],
                'malibu, ca' => ['malibu', 'pacific coast'],
                'venice, ca' => ['venice'],
                'manhattan beach, ca' => ['manhattan beach'],
                'bel air, ca' => ['bel air'],
                'studio city, ca' => ['studio city']
            ];
            
            if (isset($locationMap[$filterLocation])) {
                foreach ($locationMap[$filterLocation] as $pattern) {
                    if (strpos($propertyLocation, $pattern) !== false) {
                        $locationMatch = true;
                        break;
                    }
                }
            } else {
                // Direct string match for unlisted locations
                if (strpos($propertyLocation, $filterLocation) !== false) {
                    $locationMatch = true;
                }
            }
            
            if (!$locationMatch) return false;
        }
        
        // Property Area filter
        if (!empty($filters['area']) && !in_array($filters['area'], ['Select your Area'])) {
            $propertyLocation = strtolower($property['location']);
            $propertyTitle = strtolower($property['title']);
            $filterArea = strtolower($filters['area']);
            
            $areaMatch = false;
            switch($filterArea) {
                case 'downtown':
                    if (strpos($propertyLocation, 'downtown') !== false || strpos($propertyTitle, 'downtown') !== false) {
                        $areaMatch = true;
                    }
                    break;
                case 'suburbs':
                    if (strpos($propertyLocation, 'suburbs') !== false || strpos($propertyTitle, 'suburban') !== false) {
                        $areaMatch = true;
                    }
                    break;
                case 'waterfront':
                    if (strpos($propertyLocation, 'waterfront') !== false || strpos($propertyTitle, 'waterfront') !== false || strpos($propertyLocation, 'malibu') !== false) {
                        $areaMatch = true;
                    }
                    break;
                case 'hills':
                    if (strpos($propertyLocation, 'hills') !== false || strpos($propertyTitle, 'hills') !== false) {
                        $areaMatch = true;
                    }
                    break;
                case 'beach area':
                    if (strpos($propertyLocation, 'beach') !== false || strpos($propertyLocation, 'santa monica') !== false || strpos($propertyLocation, 'venice') !== false) {
                        $areaMatch = true;
                    }
                    break;
                case 'city center':
                    if (strpos($propertyLocation, 'downtown') !== false || strpos($propertyLocation, 'hollywood') !== false) {
                        $areaMatch = true;
                    }
                    break;
                case 'residential':
                    // Most properties are residential, so this will match most
                    $areaMatch = true;
                    break;
                default:
                    $areaMatch = true; // Default to showing all for unmatched areas
            }
            
            if (!$areaMatch) return false;
        }
        
        // Property Type filter
        if (!empty($filters['type']) && !in_array($filters['type'], ['Select your Type'])) {
            $propertyTitle = strtolower($property['title']);
            $filterType = strtolower($filters['type']);
            
            $typeMatch = false;
            switch($filterType) {
                case 'house':
                    if (strpos($propertyTitle, 'house') !== false || strpos($propertyTitle, 'drive') !== false || 
                        strpos($propertyTitle, 'blvd') !== false || strpos($propertyTitle, 'boulevard') !== false) {
                        $typeMatch = true;
                    }
                    break;
                case 'apartment':
                    if (strpos($propertyTitle, 'apartment') !== false || strpos($propertyTitle, 'apt') !== false) {
                        $typeMatch = true;
                    }
                    break;
                case 'condo':
                    if (strpos($propertyTitle, 'condo') !== false || strpos($propertyTitle, 'avenue') !== false) {
                        $typeMatch = true;
                    }
                    break;
                case 'villa':
                    if (strpos($propertyTitle, 'villa') !== false || strpos($propertyTitle, 'waterfront') !== false) {
                        $typeMatch = true;
                    }
                    break;
                case 'townhouse':
                    if (strpos($propertyTitle, 'townhouse') !== false || strpos($propertyTitle, 'town') !== false) {
                        $typeMatch = true;
                    }
                    break;
                case 'mansion':
                    if ($property['bedrooms'] >= 5 && (strpos($propertyTitle, 'rodeo') !== false || 
                        strpos($propertyTitle, 'pacific coast') !== false)) {
                        $typeMatch = true;
                    }
                    break;
                case 'studio':
                    if ($property['bedrooms'] == 1 && $property['bathrooms'] == 1) {
                        $typeMatch = true;
                    }
                    break;
                case 'penthouse':
                    if ($property['bedrooms'] >= 3 && strpos($propertyTitle, 'avenue') !== false) {
                        $typeMatch = true;
                    }
                    break;
                default:
                    $typeMatch = true; // Default to showing all for unmatched types
            }
            
            if (!$typeMatch) return false;
        }
        
        // Bedrooms filter
        if ($property['bedrooms'] < $filters['bedrooms_min']) {
            return false;
        }
        
        // Bathrooms filter  
        if ($property['bathrooms'] < $filters['bathrooms_min']) {
            return false;
        }
        
        // Amenities filter (placeholder - in real app you'd have amenity data)
        if (!empty($filters['amenities'])) {
            // For demo purposes, we'll filter based on property characteristics
            foreach ($filters['amenities'] as $amenity) {
                switch($amenity) {
                    case 'swimming-pool':
                        // Assume higher-end properties have pools
                        if ($property['bedrooms'] < 3 || strpos($property['price'], '$1,') === 0) {
                            return false;
                        }
                        break;
                    case 'garage':
                        // Assume most houses have garages, apartments might not
                        if (strpos(strtolower($property['title']), 'apartment') !== false && $property['bedrooms'] < 2) {
                            return false;
                        }
                        break;
                    case 'balcony':
                        // Default selected amenity - most properties have this
                        break;
                }
            }
        }
        
        return true;
    });
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