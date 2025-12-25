<?php
// Properties data - this would normally come from your backend API/database
function getProperties() {
    return [
        [
            'id' => 1,
            'title' => 'Hodge Hill, B36',
            'location' => 'Birmingham',
            'image' => '\public\assets\images\properties\p1\1.jpg',
            'bedrooms' => 8,
            'bathrooms' => 2,
            'wc' => 1,
            'type' => 'House',
            'area' => 'Hodge Hill'
        ],
        [
            'id' => 2,
            'title' => 'Winson Green, B18',
            'location' => 'Birmingham',
            'image' => '\public\assets\images\properties\p2\1.jpg',
            'bedrooms' => 3,
            'bathrooms' => 1,
            'wc' => 0,
            'type' => 'House',
            'area' => 'Winson Green'
        ],
        [
            'id' => 3,
            'title' => 'Erdington , B24',
            'location' => 'Birmingham',
            'image' => '\public\assets\images\properties\p3\1.jpg',
            'bedrooms' => 7,
            'bathrooms' => 2,
            'wc' => 0,
            'type' => 'House',
            'area' => 'Erdington'
        ],
        [
            'id' => 4,
            'title' => 'Lozells , B19',
            'location' => 'Birmingham',
            'image' => '\public\assets\images\properties\p4\2.jpg',
            'bedrooms' => 10,
            'bathrooms' => 10,
            'wc' => 1,
            'type' => 'House',
            'area' => 'Lozells'
        ],
        [
            'id' => 5,
            'title' => 'Sparkhill, B11 4QS',
            'location' => 'Birmingham',
            'image' => '\public\assets\images\properties\p5\1.jpg',
            'bedrooms' => 3,
            'bathrooms' => 1,
            'wc' => 1,
            'type' => 'House',
            'area' => 'Lozells'
        ],
         [
            'id' => 6,
            'title' => 'Sparkhill, B11 4PX',
            'location' => 'Birmingham',
            'image' => '\public\assets\images\properties\p6\1.jpg',
            'bedrooms' => 6,
            'bathrooms' => 2,
            'wc' => 1,
            'type' => 'House',
            'area' => 'Lozells'
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