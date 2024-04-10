export function formattedDate(date) {
    const dateObject = new Date(date)

    return `${dateObject.getDate()}.${dateObject.getMonth() + 1}.${dateObject.getFullYear()}`
}