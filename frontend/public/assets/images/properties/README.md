# Property Images Folder Structure

This folder contains images for each property. Each property has its own subfolder.

## Folder Structure

```
properties/
├── p1/          (Property ID 1 - Hodge Hill, B36)
│   ├── 1.jpg
│   ├── 2.jpg
│   ├── 3.jpg
│   └── 4.jpg
├── p2/          (Property ID 2 - Winson Green, B18)
│   ├── 1.jpg
│   ├── 2.jpg
│   └── ...
├── p3/          (Property ID 3 - Erdington, B24)
└── p4/          (Property ID 4 - Lozells, B19)
```

## How to Add Images

1. Navigate to the property folder (e.g., `p1` for property ID 1)
2. Add your images with numerical names: `1.jpg`, `2.jpg`, `3.jpg`, etc.
3. Images will be displayed in numerical order on the property details page
4. Supported formats: `.jpg`, `.jpeg`, `.png`, `.gif`, `.webp`

## Important Notes

- **Image naming**: Use numbers only (1, 2, 3, etc.) followed by the file extension
- **Sorting**: Images are automatically sorted numerically (1 comes before 2, etc.)
- **First image**: The first image (1.jpg) will be displayed as the main image
- **Thumbnails**: All images will appear as clickable thumbnails below the main image
- **Fallback**: If no images are found in the folder, the system will use the default image from the property data

## Example

For property "Hodge Hill, B36" (ID: 1):
- Create folder: `public/assets/images/properties/p1/`
- Add images: `1.jpg`, `2.jpg`, `3.jpg`, `4.jpg`, etc.
- These images will automatically appear on the product details page when viewing property ID 1
